@extends('Layouts.authlayout')

@section('auth')
<!-- Ensure Bootstrap CSS is included -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm border-0 rounded-3 p-3">
                    <div class="text-black text-center">
                        <h4 class="mb-0">Register</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control"  required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"  required>
                            </div>

                          

                            <div class="mb-3">
                                <label for="currency" class="form-label">Currency</label>
                                <select name="currency" id="currency" class="form-select" required>
                                    <option value="">Select Currency</option>
                                    <option value="usd" >USD</option>
                                    <option value="euro" >Euro</option>
                                    <option value="gbp" >GBP</option>
                                    <option value="pkr" >PKR</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Profile Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                    <div class="text-center bg-light">
                        <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="link-primary">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ensure Bootstrap JS is included -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
