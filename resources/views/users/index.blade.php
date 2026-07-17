<x-app-layout>
    @foreach (['success' => 'success', 'error' => 'danger'] as $key => $type)
        @if(session($key))<div class="alert alert-{{ $type }} alert-dismissible fade show"><strong>{{ session($key) }}</strong><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
    @endforeach

    <div class="d-flex justify-content-end mb-3"><a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a></div>
    <section class="card">
        <div class="card-header bg-danger text-white"><h5 class="mb-0">All Users</h5></div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="text-center bg-light"><tr><th>#</th><th>Profile</th><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Created</th><th>Last Login</th><th>Contact</th><th>Action</th></tr></thead>
                <tbody class="text-center">
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $users->firstItem() + $loop->index }}</td>
                            <td>@if($user->profile_image)<img src="{{ asset('storage/'.$user->profile_image) }}" alt="{{ $user->name }}" width="48" height="48" class="rounded-circle object-fit-cover">@else<span class="badge bg-secondary">No Image</span>@endif</td>
                            <td class="text-start"><strong>{{ $user->name }}</strong><div class="small text-muted">Age: {{ $user->age ?? 'Not set' }} | Experience: {{ $user->experience ?? 'Not set' }}</div></td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge bg-dark">{{ \App\Models\User::ROLES[$user->role] ?? $user->role }}</span></td>
                            <td><span class="badge {{ $user->status ? 'bg-success' : 'bg-secondary' }}">{{ $user->status ? 'Active' : 'Inactive' }}</span></td>
                            <td>{{ \App\Models\User::formatLocalDateTime($user->created_at) }}</td>
                            <td>{{ \App\Models\User::formatLocalDateTime($user->last_login_at, 'Never') }}</td>
                            <td>{{ $user->contact_number ?? 'Not set' }}</td>
                            <td><div class="d-flex justify-content-center gap-2"><a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-primary" aria-label="Edit user"><i class="bi bi-pencil-square"></i></a><form method="POST" action="{{ route('users.destroy', $user) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" aria-label="Delete user"><i class="bi bi-trash"></i></button></form></div></td>
                        </tr>
                    @empty<tr><td colspan="10">No users available.</td></tr>@endforelse
                </tbody>
            </table>
        </div>
        @if($users->hasPages())<div class="d-flex justify-content-end m-2">{!! $users->links('pagination::simple-bootstrap-5') !!}</div>@endif
    </section>
</x-app-layout>
