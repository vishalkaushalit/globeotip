<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.index', ['users' => User::latest()->paginate(10)]);
    }

    public function create(): View
    {
        return view('users.create', ['user' => null, 'roles' => User::ROLES]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['password'] = Hash::make($data['password']);
        $data['profile_image'] = $request->file('profile_image')?->store('authors', 'public');
        User::create($data);

        return to_route('users.index')->with('success', 'User added successfully.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', ['user' => $user, 'roles' => User::ROLES]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $this->validatedData($request, $user);

        if ($data['password'] ?? null) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('profile_image')) {
            $this->deleteImage($user->profile_image);
            $data['profile_image'] = $request->file('profile_image')->store('authors', 'public');
        }

        $user->update($data);

        return to_route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($request->user()->is($user)) {
            return to_route('users.index')->with('error', 'You cannot delete your own account while logged in.');
        }

        $this->deleteImage($user->profile_image);
        $user->delete();

        return to_route('users.index')->with('success', 'User deleted successfully.');
    }

    private function validatedData(Request $request, ?User $user = null): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['nullable', 'integer', 'min:1', 'max:120'],
            'experience' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:5000'],
            'social_media_profile' => ['nullable', 'url', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:30'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'profile_image' => ['nullable', 'image', 'max:2048'],
            'role' => ['required', Rule::in(array_keys(User::ROLES))],
            'status' => ['required', 'boolean'],
            'password' => [$user ? 'nullable' : 'required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data['status'] = $request->boolean('status');

        return $data;
    }

    private function deleteImage(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}
