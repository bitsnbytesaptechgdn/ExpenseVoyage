@extends('Layouts.backendlayout')
@section('backend')

<div class="main-panel">
    <div class="content-wrapper">
        <!-- Flexbox Container for Search and Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Manage Users</h3>

            <!-- Search Form Aligned with Heading -->
            <form action="{{ route('users.search') }}" method="GET" class="d-flex">
                <!-- Search Input -->
                <input type="text" name="search" class="form-control" placeholder="Search by name"
                    value="{{ request()->get('search') }}" style="width: 200px; margin-right: 10px;">

                <!-- Sort Dropdown -->
                <select name="sort" class="form-control" style="width: 150px; margin-right: 10px;">
                    <option value="asc" {{ request()->get('sort') == 'asc' ? 'selected' : '' }}>A to Z</option>
                    <option value="desc" {{ request()->get('sort') == 'desc' ? 'selected' : '' }}>Z to A</option>
                </select>

                <!-- Filter Dropdown -->
                <select name="role" class="form-control" style="width: 150px; margin-right: 10px;">
                    <option value="">All Users</option>
                    <option value="admin" {{ request()->get('role') == 'admin' ? 'selected' : '' }}>Admins</option>
                    <option value="user" {{ request()->get('role') == 'user' ? 'selected' : '' }}>Users</option>
                </select>

                <!-- Submit Button for Search, Sort & Filter -->
                <button class="btn btn-primary" type="submit">Search & Apply</button>
            </form>
        </div>

        <!-- Create User Button -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createUserModal">
            Add User
        </button>

        <!-- Users Table -->
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Currency</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>{{ strtoupper($user->currency) }}</td>
                        <td>
                            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('img/profile.png') }}"
                                alt="{{ $user->name }}" class="nav-profile" width="100" style="object-fit: cover;">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#editUserModal{{ $user->id }}">Update</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteUserModal{{ $user->id }}">Delete</button>
                        </td>
                    </tr>

                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1"
                        aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('users.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Update User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                                required>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-6">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                                required>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-6">
                                                <label for="role">Role</label>
                                                <select name="role" class="form-control" required>
                                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User
                                                    </option>
                                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="currency">Currency</label>
                                                <select name="currency" class="form-control" required>
                                                    <option value="usd" {{ $user->currency == 'usd' ? 'selected' : '' }}>USD
                                                    </option>
                                                    <option value="euro" {{ $user->currency == 'euro' ? 'selected' : '' }}>
                                                        EURO</option>
                                                    <option value="gbp" {{ $user->currency == 'gbp' ? 'selected' : '' }}>GBP
                                                    </option>
                                                    <option value="pkr" {{ $user->currency == 'pkr' ? 'selected' : '' }}>PKR
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1"
                        aria-labelledby="deleteUserModalLabel{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel{{ $user->id }}">Delete User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete the user <strong>{{ $user->name }}</strong>? This
                                            action cannot be undone.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                @endforeach
            </tbody>
        </table>

        <div class="pagination-wrapper">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>

        <!-- Create User Modal -->
        <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createUserModalLabel">Add User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control" required>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="currency">Currency</label>
                                    <select name="currency" class="form-control" required>
                                        <option value="usd">USD</option>
                                        <option value="euro">EURO</option>
                                        <option value="gbp">GBP</option>
                                        <option value="pkr">PKR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection