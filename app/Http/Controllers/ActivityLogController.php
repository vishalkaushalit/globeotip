<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityLogController extends Controller
{
    public function index(Request $request): View
    {
        $logs = ActivityLog::query()
            ->when($request->filled('user'), fn ($query) => $query->where('user_name', 'like', '%'.$request->string('user').'%'))
            ->when($request->filled('area'), fn ($query) => $query->where('area', $request->string('area')))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('activity-logs.index', [
            'logs' => $logs,
            'areas' => ActivityLog::query()->distinct()->orderBy('area')->pluck('area'),
        ]);
    }
}
