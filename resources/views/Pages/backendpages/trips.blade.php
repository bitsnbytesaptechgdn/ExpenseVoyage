@extends('Layouts.backendlayout')

@section('backend')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Heading -->
            <h3 class="mb-0">Manage Trips</h3>

            <form action="{{ route('trips.sort') }}" method="GET" class="d-flex">
                <!-- Search Input -->
                <input type="text" name="search" class="form-control" placeholder="Search by title"
                    value="{{ request()->get('search') }}" style="width: 200px; margin-right: 10px;">

                <!-- Sort Dropdown -->
                <select name="sort_by" class="form-control" style="width: 200px; margin-right: 10px;">
                    <option value="name_a_to_z" {{ request()->get('sort_by') == 'name_a_to_z' ? 'selected' : '' }}>A to Z
                    </option>
                    <option value="name_z_to_a" {{ request()->get('sort_by') == 'name_z_to_a' ? 'selected' : '' }}>Z to A
                    </option>
                    <option value="price_low_to_high" {{ request()->get('sort_by') == 'price_low_to_high' ? 'selected' : '' }}>Price Low to High</option>
                    <option value="price_high_to_low" {{ request()->get('sort_by') == 'price_high_to_low' ? 'selected' : '' }}>Price High to Low</option>
                </select>

                <!-- Submit Button for Search & Sort -->
                <button class="btn btn-primary" type="submit">Search & Apply</button>
            </form>
        </div>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createTripModal">Add
            Trip</button>
        <div class="row">
            @foreach ($trips as $trip)
                <div class="col-md-4 mb-4">
                    <div class="card shadow rounded-3">
                        <a href="{{ route('expenses.index', ['trip_id' => $trip->id]) }}"
                            class="text-decoration-none text-dark">
                            <img src="{{ asset('storage/' . $trip->image) }}" class="card-img-top rounded-top-3"
                                alt="Trip Image" style="height: 220px;">
                        </a>

                        <div class="card-body">
                            <h5 class="card-title">{{ $trip->title }}</h5>
                            <p class="card-text">Start Date: {{ $trip->start_date->toDateString() }}</p>
                            <p class="card-text">End Date: {{ $trip->end_date->toDateString() }}</p>
                            <p class="card-text">Total Budget: {{ $trip->total_budget }}</p>
                            <div class="d-flex">
                                <button class="btn btn-success me-2" data-bs-toggle="modal"
                                    data-bs-target="#updateTripModal{{ $trip->id }}">Update</button>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteTripModal{{ $trip->id }}">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Create Trip Modal -->
<div class="modal fade" id="createTripModal" tabindex="-1" aria-labelledby="createTripModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTripModalLabel">Add Trip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('trips.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- Start Date -->
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>

                    <!-- End Date -->
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <!-- Total Budget -->
                    <div class="mb-3">
                        <label for="total_budget" class="form-label">Total Budget</label>
                        <input type="number" name="total_budget" id="total_budget" class="form-control" step="0.01"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($trips as $trip)
    <!-- Update Trip Modal -->
    <div class="modal fade" id="updateTripModal{{ $trip->id }}" tabindex="-1"
        aria-labelledby="updateTripModalLabel{{ $trip->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateTripModalLabel{{ $trip->id }}">Update Trip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('trips.update', $trip->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $trip->title }}"
                                required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control"
                                rows="3">{{ $trip->description }}</textarea>
                        </div>

                        <!-- Start Date -->
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control"
                                value="{{ $trip->start_date->toDateString() }}" required>
                        </div>

                        <!-- End Date -->
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control"
                                value="{{ $trip->end_date->toDateString() }}" required>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if ($trip->image)
                                <img src="{{ asset('storage/' . $trip->image) }}" class="img-thumbnail mt-2"
                                    style="max-height: 150px;">
                            @endif
                        </div>

                        <!-- Total Budget -->
                        <div class="mb-3">
                            <label for="total_budget" class="form-label">Total Budget</label>
                            <input type="number" name="total_budget" id="total_budget" class="form-control" step="0.01"
                                value="{{ $trip->total_budget }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Trip Modal -->
    <div class="modal fade" id="deleteTripModal{{ $trip->id }}" tabindex="-1"
        aria-labelledby="deleteTripModalLabel{{ $trip->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTripModalLabel{{ $trip->id }}">Delete Trip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('trips.destroy', $trip->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Are you sure you want to delete this trip?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@endsection