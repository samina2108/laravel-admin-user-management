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

        <a href="{{ route('users.export') }}" class="btn btn-success">
    <i class="bi bi-download"></i> Export CSV
</a>

    </div>

    <!-- cards -->
 
<!-- search box -->
<div class="mb-3 d-flex">

<input type="text"
       id="search"
       class="form-control me-2"
       placeholder="Search name or email...">

       <button type="button" class="btn btn-outline-primary">
    <i class="bi bi-search"></i>
</button>
</div>


<div class="row mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h6 class="text-muted">Total Users</h6>
                <h3 class="fw-bold">{{ $totalUsers }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h6 class="text-muted">Active Users</h6>
                <h3 class="fw-bold text-success">{{ $activeUsers }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h6 class="text-muted">Inactive Users</h6>
                <h3 class="fw-bold text-danger">{{ $inactiveUsers }}</h3>
            </div>
        </div>
    </div>
</div>

    <!-- Table -->
    <div class="bg-white rounded shadow-sm p-4">

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead style="background:#f8f9fa">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody id="userTable">
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>

                        <td class="fw-semibold">
                            {{ $user->name }}
                        </td>

                        <td class="text-muted">
                            {{ $user->email }}
                        </td>

                        <td>
                            @if($user->status)
                                <span class="badge rounded-pill bg-success px-3">
                                    Active
                                </span>
                            @else
                                <span class="badge rounded-pill bg-danger px-3">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td class="text-center">

                            <!-- Edit -->
                            <a href="{{ route('users.edit',$user->id) }}"
                               class="btn btn-sm btn-outline-primary me-1">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('users.destroy',$user->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger me-1"
                                        onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                            <!-- Status -->
                            <a href="{{ url('user-status',$user->id) }}"
                               class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-arrow-repeat"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $users->links() }}
        </div>

    </div>

</div>
<script>
const ajaxUrl = "{{ url('/admin/users/ajax-search') }}";
const searchInput = document.getElementById('search');

searchInput.addEventListener('keyup', function () {

    let query = this.value;

    // empty hone par normal pagination wapas
    if (query.length === 0) {
        location.reload();
        return;
    }

    fetch(ajaxUrl + '?search=' + query)
        .then(response => response.json())
        .then(users => {

            let rows = '';
            let i = 1;

            users.forEach(user => {

                let statusBadge = user.status
                    ? `<span class="badge rounded-pill bg-success px-3">Active</span>`
                    : `<span class="badge rounded-pill bg-danger px-3">Inactive</span>`;

                rows += `
                <tr>
                    <td>${i++}</td>
                    <td class="fw-semibold">${user.name}</td>
                    <td class="text-muted">${user.email}</td>
                    <td>${statusBadge}</td>

                    <td class="text-center">

                        <a href="/admin/users/${user.id}/edit"
                           class="btn btn-sm btn-outline-primary me-1">
                           <i class="bi bi-pencil"></i>
                        </a>

                        <form action="/admin/users/${user.id}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Are you sure?')">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">

                            <button class="btn btn-sm btn-outline-danger me-1">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                        <a href="/user-status/${user.id}"
                           class="btn btn-sm btn-outline-secondary">
                           <i class="bi bi-arrow-repeat"></i>
                        </a>

                    </td>
                </tr>`;
            });

            document.getElementById('userTable').innerHTML = rows;

            // pagination hide during ajax
            document.querySelector('.pagination')?.remove();
        })
        .catch(err => console.error('AJAX Search Error:', err));
});
</script>
    
</x-app-layout>
