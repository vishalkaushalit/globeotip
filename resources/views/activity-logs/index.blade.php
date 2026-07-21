<x-app-layout>
    <div class="pagetitle">
        <h1>Activity Log</h1>
        <p class="text-muted mb-0">See who changed each part of the website.</p>
    </div>

    <section class="card mt-3">
        <div class="card-body pt-3">
            <form method="GET" action="{{ route('activity-logs.index') }}" class="row g-3 align-items-end mb-4">
                <div class="col-md-5">
                    <label for="activity-user" class="form-label">User</label>
                    <input id="activity-user" name="user" type="search" class="form-control"
                        value="{{ request('user') }}" placeholder="Search by user name">
                </div>
                <div class="col-md-5">
                    <label for="activity-area" class="form-label">Website section</label>
                    <select id="activity-area" name="area" class="form-select">
                        <option value="">All sections</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area }}" @selected(request('area') === $area)>{{ $area }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button class="btn btn-primary" type="submit">Filter</button>
                    <a class="btn btn-outline-secondary" href="{{ route('activity-logs.index') }}">Clear</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Date &amp; Time</th>
                            <th>User</th>
                            <th>Action</th>
                            <th>Website Section</th>
                            <th>Item</th>
                            <th>Fields</th>
                            <th>IP Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                            <tr>
                                <td class="text-nowrap">{{ \App\Models\User::formatLocalDateTime($log->created_at) }}</td>
                                <td>
                                    <strong>{{ $log->user_name }}</strong>
                                    <div class="small text-muted">{{ $log->user_email }}</div>
                                </td>
                                <td>
                                    <span class="badge {{ $log->action === 'deleted' ? 'bg-danger' : ($log->action === 'created' ? 'bg-success' : 'bg-primary') }}">
                                        {{ ucfirst($log->action) }}
                                    </span>
                                </td>
                                <td>{{ $log->area }}</td>
                                <td>{{ $log->subject ?? '—' }}</td>
                                <td>
                                    @forelse ($log->changed_fields ?? [] as $field)
                                        <span class="badge bg-light text-dark border">{{ str($field)->headline() }}</span>
                                    @empty
                                        —
                                    @endforelse
                                </td>
                                <td>{{ $log->ip_address ?? '—' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center py-4 text-muted">No activity has been recorded yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($logs->hasPages())
                <div class="d-flex justify-content-end mt-3">
                    {{ $logs->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
