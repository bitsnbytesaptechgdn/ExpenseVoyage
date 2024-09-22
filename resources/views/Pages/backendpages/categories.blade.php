@extends('Layouts.backendlayout')

@section('backend')

<div class="main-panel">
    <div class="content-wrapper">
        <!-- Flexbox for Heading and Search Form in One Line -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Heading -->
            <h3 class="mb-0">Manage Categories</h3>

            <!-- Search Form Aligned with Heading -->
            <form action="{{ route('categories.search') }}" method="GET" class="d-flex">
                <!-- Search Input -->
                <input type="text" name="search" class="form-control" placeholder="Search by name"
                    value="{{ request()->get('search') }}" style="width: 200px; margin-right: 10px;">
                <select name="sort" class="form-control" style="width: 150px; margin-right: 10px;">
                    <option value="asc" {{ request()->get('sort') == 'asc' ? 'selected' : '' }}>A to Z</option>
                    <option value="desc" {{ request()->get('sort') == 'desc' ? 'selected' : '' }}>Z to A</option>
                </select>
                <button class="btn btn-primary" type="submit">Search & Apply</button>
            </form>
        </div>

        <!-- Create Category Button -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            Add Category
        </button>

        <!-- Categories Table -->
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <!-- Edit Button -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $category->id }}">
                                Update
                            </button>

                            <!-- Delete Button -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $category->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $category->id }}">Update Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $category->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea class="form-control"
                                                name="description">{{ $category->description }}</textarea>
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
                    <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $category->id }}">Delete Category
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete the category
                                            <strong>{{ $category->name }}</strong>? This action cannot be undone.
                                        </p>
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

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description"></textarea>
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

@endsection