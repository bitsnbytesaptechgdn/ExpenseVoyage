@extends('Layouts.backendlayout')
@section('backend')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card mb-4 position-relative">
            <div class="row align-items-center">
                <div class="col-md-4 position-relative">
                    @if ($trip->image)
                        <img src="{{ asset('storage/' . $trip->image) }}" class="img-fluid rounded-start" alt="{{ $trip->title }}">
                    @else
                        <img src="placeholder-image-url.jpg" class="img-fluid rounded-start" alt="No Image Available">
                    @endif
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                        <h5 class="text-white text-center fw-bold fs-3">{{ $trip->title }}</h5>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="description" class="form-label"><strong>Description:</strong></label>
                                    <input type="text" id="description" class="form-control" value="{{ $trip->description }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="start_date" class="form-label"><strong>Start Date:</strong></label>
                                    <input type="text" id="start_date" class="form-control" value="{{ \Carbon\Carbon::parse($trip->start_date)->format('M d, Y') }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="end_date" class="form-label"><strong>End Date:</strong></label>
                                    <input type="text" id="end_date" class="form-control" value="{{ \Carbon\Carbon::parse($trip->end_date)->format('M d, Y') }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="total_budget" class="form-label"><strong>Total Budget:</strong></label>
                                    <input type="text" id="total_budget" class="form-control" value="${{ number_format($trip->total_budget, 2) }}" readonly>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('expenses.report', $trip->id) }}" class="btn form-control btn-primary mb-3">Download Expenses Report</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion" id="expensesAccordion">
        <div class="accordion-item ">
                <h2 class="accordion-header" id="headingItineraries">
                    <button class="accordion-button" style="background-color: inherit;" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseItineraries" aria-expanded="false" aria-controls="collapseItineraries">
                        Itineraries
                    </button>
                </h2>
                <div id="collapseItineraries" class="accordion-collapse show" aria-labelledby="headingItineraries"
                    data-bs-parent="#expensesAccordion">
                    <div class="accordion-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex justify-content-center fw-bolder align-items-center mb-4">
                                <h3>Manage Itineraries</h3>
                            </div>
                        </div>
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#createItineraryModal">Add
                            Itinerary</button>
                        <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Budget</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itineraries as $itinerary)
                                <tr>
                                    <td>{{ $itinerary->name }}</td>
                                    <td>{{ number_format($itinerary->budget, 2) }}</td>
                                    <td>{{ $itinerary->name }}</td>
                                    <td>
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#updateItineraryModal{{ $itinerary->id }}">Update</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteItineraryModal{{ $itinerary->id }}">Delete</button>
                                    </td>
                                </tr>
                                    <!-- Update Itinerary Modal -->
                                    <div class="modal fade" id="updateItineraryModal{{ $itinerary->id }}" tabindex="-1"
                                        aria-labelledby="updateItineraryModalLabel{{ $itinerary->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="updateItineraryModalLabel{{ $itinerary->id }}">
                                                        Update
                                                        Itinerary</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('itineraries.update', $itinerary->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" name="name" id="name" class="form-control"
                                                                value="{{ $itinerary->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="budget" class="form-label">Budget</label>
                                                            <input type="number" name="budget" id="budget"
                                                                class="form-control" value="{{ $itinerary->budget }}"
                                                                step="0.01" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category_id" class="form-label">Category</label>
                                                            <select name="category_id" id="category_id" class="form-select"
                                                                required>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}" {{ $category->id == $itinerary->category_id ? 'selected' : '' }}>
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Itinerary Modal -->
                                    <div class="modal fade" id="deleteItineraryModal{{ $itinerary->id }}" tabindex="-1"
                                        aria-labelledby="deleteItineraryModalLabel{{ $itinerary->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="deleteItineraryModalLabel{{ $itinerary->id }}">
                                                        Delete
                                                        Itinerary</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('itineraries.destroy', $itinerary->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this itinerary?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingExpenses">
                    <button class="accordion-button" style="background-color: inherit;" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExpenses" aria-expanded="true" aria-controls="collapseExpenses">
                        Expenses
                    </button>
                </h2>
                <div id="collapseExpenses" class="accordion-collapse show" aria-labelledby="headingExpenses"
                    data-bs-parent="#expensesAccordion">
                    <div class="accordion-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex justify-content-center fw-bolder align-items-center mb-4">
                                <h3>Manage Expenses</h3>
                            </div>
                        </div>
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#createExpenseModal">Add
                            Expense</button>
                        <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                    <th>Itinerary</th>
                                    <th>Amount</th>
                                    <th>Note</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->itinerary->name }}</td>
                                        <td>{{ number_format($expense->amount, 2) }}</td>
                                        <td>{{ $expense->note }}</td>
                                        <td>
                                            <button class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#updateExpenseModal{{ $expense->id }}">Update</button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteExpenseModal{{ $expense->id }}">Delete</button>
                                        </td>
                                    </tr>
                                    <div class="d-flex justify-content-between align-items-center">

                                        <!-- Update Expense Modal -->
                                        <div class="modal fade" id="updateExpenseModal{{ $expense->id }}" tabindex="-1"
                                            aria-labelledby="updateExpenseModalLabel{{ $expense->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="updateExpenseModalLabel{{ $expense->id }}">
                                                            Update
                                                            Expense</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('expenses.update', $expense->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="itinerary_id"
                                                                    class="form-label">Itinerary</label>
                                                                <select name="itinerary_id" id="itinerary_id"
                                                                    class="form-select" required>
                                                                    @foreach ($itineraries as $itinerary)
                                                                        <option value="{{ $itinerary->id }}" {{ $itinerary->id == $expense->itinerary_id ? 'selected' : '' }}>
                                                                            {{ $itinerary->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="amount" class="form-label">Amount</label>
                                                                <input type="number" name="amount" id="amount"
                                                                    class="form-control" value="{{ $expense->amount }}"
                                                                    step="0.01" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="note" class="form-label">Note</label>
                                                                <textarea name="note" id="note"
                                                                    class="form-control">{{ $expense->note }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Expense Modal -->
                                        <div class="modal fade" id="deleteExpenseModal{{ $expense->id }}" tabindex="-1"
                                            aria-labelledby="deleteExpenseModalLabel{{ $expense->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="deleteExpenseModalLabel{{ $expense->id }}">
                                                            Delete
                                                            Expense</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('expenses.destroy', $expense->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this expense?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Expense Modal -->
<div class="modal fade" id="createExpenseModal" tabindex="-1" aria-labelledby="createExpenseModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createExpenseModalLabel">Add Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('expenses.store') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                    <div class="mb-3">
                        <label for="itinerary_id" class="form-label">Itinerary</label>
                        <select name="itinerary_id" id="itinerary_id" class="form-select" required>
                            @foreach ($itineraries as $itinerary)
                                <option value="{{ $itinerary->id }}">{{ $itinerary->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Note</label>
                        <textarea name="note" id="note" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Expense</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Create Itinerary Modal -->
<div class="modal fade" id="createItineraryModal" tabindex="-1" aria-labelledby="createItineraryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createItineraryModalLabel">Add Itinerary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('itineraries.store') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="budget" class="form-label">Budget</label>
                        <input type="number" name="budget" id="budget" class="form-control" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-select" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Itinerary</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection