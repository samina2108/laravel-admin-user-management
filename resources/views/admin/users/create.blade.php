
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

<form method="POST" action="{{ route('users.store') }}">
@csrf
<input name="name" placeholder="Name">
<input name="email" placeholder="Email">
<input name="password" type="password" placeholder="Password">

<select name="status">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>

<button class="btn btn-sm btn-outline-danger me-1" type="submit">Save</button>
</form>

</x-app-layout>