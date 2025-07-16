@extends('layouts.sidebar')

@section('content')
@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

    <div class="container">
        <div class="card shadow p-4">
            <h4 class="mb-4 text-center">Add New HR</h4>

            <form action="{{ route('hr.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Department:</label>
                        <select name="department" class="form-select" required>
                            <option value="">Select Department</option>
                            <option value="Sales">Sales</option>
                            <option value="Operations">Operations</option>
                            <option value="IT">IT</option>
                            <option value="Finance">Finance</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date of Joining:</label>
                        <input type="date" name="joining_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Phone Number:</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Address:</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">Add</button>
                    <a href="{{ url('/admin/dashboard') }}" class="btn btn-danger ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
