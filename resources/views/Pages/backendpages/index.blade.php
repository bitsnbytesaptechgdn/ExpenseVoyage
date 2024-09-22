@extends('Layouts.backendlayout')
@section('backend')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="{{ asset('backend/images/dashboard/people.svg') }}" alt="people">
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body text-center">
                                <p class="mb-4">Total Trips</p>
                                <p class="fs-30 mb-2">{{ $totalTrips }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body text-center">
                                <p class="mb-4">Total Itineraries</p>
                                <p class="fs-30 mb-2">{{ $totalItineraries }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if (Auth::user()->role === 'admin')
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body text-center">
                                    <p class="mb-4">Total Users</p>
                                    <p class="fs-30 mb-2">{{ $totalUsers }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body text-center">
                                    <p class="mb-4">Total Categories</p>
                                    <p class="fs-30 mb-2">{{ $totalCategories }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body text-center">
                                    <p class="mb-4">Premium Users</p>
                                    <p class="fs-30 mb-2">{{ $premiumUsers }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body text-center">
                                    <p class="mb-4">Total Expenses</p>
                                    <p class="fs-30 mb-2">{{ $totalExpenses }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection