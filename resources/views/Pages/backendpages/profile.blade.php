@extends('layouts.backendlayout')

@section('backend')
<div class="container my-5">
    <div class="card shadow-lg rounded-lg">
        <div class="card-body">
            <!-- Profile Information -->
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
                <div class="d-flex align-items-center gap-5">
                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('img/profile.png') }}"
                        alt="Profile Picture" class="rounded-circle"
                        style="width: 6rem; height: 6rem; object-fit: cover;">
                    <div>
                        <h2 class="fs-4 fw-bold text-dark">{{ Auth::user()->name }}</h2>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                        <p class="text-secondary">{{ Auth::user()->role }}</p>
                    </div>
                </div>

                <!-- Delete Account Icon -->
                <form action="{{ route('profile.destroy', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-danger hover-text-danger-800 border-0 bg-transparent">
                        <i class="fas fa-trash-alt fa-2x"></i>
                        <span class="visually-hidden">Delete Account</span>
                    </button>
                </form>
            </div>

            <!-- Update Form -->
            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data"
                class="row">
                @csrf
                @method('PUT')

                <!-- Name and Profile Image in one line -->
                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control"
                            required>
                    </div>

                    <!-- Profile Image -->
                    <div class="col-md-6">
                        <label for="image" class="form-label">Profile Image</label>
                        <input type="file" name="image" id="image" class="form-control text-muted">
                    </div>
                </div>

                <!-- Password and Confirm Password in one line -->
                <div class="row mt-3">
                    <!-- New Password -->
                    <div class="col-md-6">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <!-- Currency -->
                    <div class="col-md-6">
                        <label for="currency" class="form-label">Currency</label>
                        <select name="currency" id="currency" class="form-select" required>
                            <option value="">Select Currency</option>
                            <option value="usd" {{ strtolower(Auth::user()->currency) == 'usd' ? 'selected' : '' }}>USD
                            </option>
                            <option value="euro" {{ strtolower(Auth::user()->currency) == 'euro' ? 'selected' : '' }}>Euro
                            </option>
                            <option value="gbp" {{ strtolower(Auth::user()->currency) == 'gbp' ? 'selected' : '' }}>GBP
                            </option>
                            <option value="pkr" {{ strtolower(Auth::user()->currency) == 'pkr' ? 'selected' : '' }}>PKR
                            </option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row mt-3">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection