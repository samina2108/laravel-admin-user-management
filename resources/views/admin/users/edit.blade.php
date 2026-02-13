<x-app-layout>
<div class="px-5 py-4">

    <!-- Header -->
    <div class="bg-white rounded shadow-sm p-4 mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-0 fw-bold">User Management</h4>
            <small class="text-muted">Manage system users</small>
        </div>

        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add User
        </a>

        
</a>

    </div>
<form method="POST" action="{{ route('users.update',$user->id) }}">
@csrf
@method('PUT')

<input name="name" value="{{ $user->name }}">
<input name="email" value="{{ $user->email }}">

<select name="status">
<option value="1" {{ $user->status ? 'selected' : '' }}>Active</option>
<option value="0" {{ !$user->status ? 'selected' : '' }}>Inactive</option>
</select>

<button class="btn btn-sm btn-outline-danger me-1" type="submit">Update</button>
</form>
</x-app-layout>