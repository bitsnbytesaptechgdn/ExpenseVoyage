@extends('Layouts.backendlayout')

@section('backend')

<div class="main-panel">
    <div class="content-wrapper">
        <!-- Flexbox Container for Search and Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Manage Contacts</h3>

            <form action="{{ route('contacts.search') }}" method="GET" class="d-flex">
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

        <!-- Contacts Table -->
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#editContactModal{{ $contact->id }}">Edit</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteContactModal{{ $contact->id }}">Delete</button>
                        </td>
                    </tr>

                    <!-- Edit Contact Modal -->
                    <div class="modal fade" id="editContactModal{{ $contact->id }}" tabindex="-1"
                        aria-labelledby="editContactModalLabel{{ $contact->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editContactModalLabel{{ $contact->id }}">Edit Contact
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $contact->name }}"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $contact->email }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subject">Subject</label>
                                            <input type="text" name="subject" class="form-control"
                                                value="{{ $contact->subject }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message">Message</label>
                                            <textarea name="message" class="form-control"
                                                required>{{ $contact->message }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Delete Contact Modal -->
                    <div class="modal fade" id="deleteContactModal{{ $contact->id }}" tabindex="-1"
                        aria-labelledby="deleteContactModalLabel{{ $contact->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteContactModalLabel{{ $contact->id }}">Delete
                                            Contact</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete the contact <strong>{{ $contact->name }}</strong>?
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