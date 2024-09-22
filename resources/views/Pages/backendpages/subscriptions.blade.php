@extends('Layouts.backendlayout')

@section('backend')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-4">Manage Subscriptions</h3>

            <form action="{{ route('subscribe.search') }}" method="GET" class="d-flex align-items-center">
                <!-- Search Input -->
                <input type="text" name="search" class="form-control" placeholder="Search by name"
                    value="{{ request()->get('search') }}" style="width: 200px; margin-right: 10px;">

                <!-- Sort Dropdown -->
                <select name="sort" class="form-control" style="width: 150px; margin-right: 10px;">
                    <option value="asc" {{ request()->get('sort') == 'asc' ? 'selected' : '' }}>A to Z</option>
                    <option value="desc" {{ request()->get('sort') == 'desc' ? 'selected' : '' }}>Z to A</option>
                </select>

                <!-- Submit Button for Search & Sort -->
                <button class="btn btn-primary" type="submit">Search & Apply</button>
            </form>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $subscription)
                    <tr>
                        <td>{{ $subscription->user_id }}</td>
                        <td>{{ $subscription->email }}</td>
                        <td>{{ $subscription->phone }}</td>
                        <td>{{ ucfirst($subscription->status) }}</td>
                        <td>
                            <button class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#updateModal{{ $subscription->id }}">Update</button>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $subscription->id }}">Delete</button>
                        </td>
                    </tr>

                    <!-- Update Modal -->
                    <div class="modal fade" id="updateModal{{ $subscription->id }}" tabindex="-1"
                        aria-labelledby="updateModalLabel{{ $subscription->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('subscribe.update', $subscription->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Subscription</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="email{{ $subscription->id }}" class="form-label">Email
                                                Address</label>
                                            <input type="text" class="form-control" name="email"
                                                id="email{{ $subscription->id }}" value="{{ $subscription->email }}"
                                                required placeholder="example@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone{{ $subscription->id }}" class="form-label">Phone
                                                Number</label>
                                            <input type="tel" class="form-control" name="phone"
                                                id="phone{{ $subscription->id }}" value="{{ $subscription->phone }}"
                                                required placeholder="+1 (555) 555-5555">
                                        </div>
                                        <div class="mb-3">
                                            <label for="status{{ $subscription->id }}" class="form-label">Status</label>
                                            <select class="form-select" name="status" id="status{{ $subscription->id }}"
                                                required>
                                                <option value="active" {{ $subscription->status === 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ $subscription->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
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
                    <div class="modal fade" id="deleteModal{{ $subscription->id }}" tabindex="-1"
                        aria-labelledby="deleteModalLabel{{ $subscription->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('subscribe.destroy', $subscription->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Subscription</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this subscription?
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
    </div>
</div>
@endsection