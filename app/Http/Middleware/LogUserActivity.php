<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use App\Models\User;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class LogUserActivity
{
    private const IGNORED_FIELDS = [
        '_token',
        '_method',
        'password',
        'password_confirmation',
        'current_password',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->user() && $this->shouldLog($request, $response)) {
            $this->record($request);
        }

        return $response;
    }

    private function shouldLog(Request $request, Response $response): bool
    {
        return in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'], true)
            && $response->getStatusCode() < 400
            && (! $request->hasSession() || (! $request->session()->has('errors') && ! $request->session()->has('error')))
            && ! $request->routeIs('logout', 'register', 'verification.*', 'password.*');
    }

    private function record(Request $request): void
    {
        $user = $request->user();
        $routeName = $request->route()?->getName()
            ?? ($request->isMethod('post') && $request->is('login') ? 'login' : null);
        $area = $this->area($routeName);
        $action = $this->action($request, $routeName);
        $subject = $this->subject($request);

        ActivityLog::create([
            'user_id' => User::query()->whereKey($user->getKey())->exists() ? $user->getKey() : null,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'action' => $action,
            'area' => $area,
            'subject' => $subject,
            'description' => trim("{$user->name} {$action} {$area}".($subject ? ": {$subject}" : '')),
            'method' => $request->method(),
            'route_name' => $routeName,
            'url' => $request->fullUrl(),
            'changed_fields' => collect(array_keys($request->except(self::IGNORED_FIELDS)))
                ->reject(fn (string $field) => $request->file($field) !== null)
                ->values()
                ->all(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
    }

    private function area(?string $routeName): string
    {
        $prefix = Str::before($routeName ?? 'website', '.');

        return match ($prefix) {
            'login' => 'Authentication',
            'profile' => 'My Profile',
            'users' => 'Users',
            'states' => 'Service Areas / States',
            'cities' => 'Service Areas / Cities',
            'neighbourhoods' => 'Service Areas / Neighbourhoods',
            default => Str::headline($prefix),
        };
    }

    private function action(Request $request, ?string $routeName): string
    {
        if ($routeName === 'login') {
            return 'logged in to';
        }

        if ($request->isMethod('delete')) {
            return 'deleted';
        }

        if (Str::endsWith($routeName ?? '', '.store')) {
            return 'created';
        }

        return 'updated';
    }

    private function subject(Request $request): ?string
    {
        foreach ($request->route()?->parameters() ?? [] as $parameter) {
            if ($parameter instanceof Model) {
                return (string) ($parameter->name ?? $parameter->title ?? $parameter->slug ?? "#{$parameter->getKey()}");
            }
        }

        return null;
    }
}
