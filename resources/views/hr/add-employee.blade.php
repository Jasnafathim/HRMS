@extends('layouts.hr-sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4 text-center">Add New Employee</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form action="{{ route('hr.employee.store') }}" method="POST" class="card p-4 shadow">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="col-md-6">
    <label>Department:</label>
    <select name="department" class="form-control" required>
        <option value="">-- Select Department --</option>
        <option value="Sales">Sales</option>
        <option value="IT">IT</option>
        <option value="Finance">Finance</option>
    </select>
</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Date of Joining:</label>
                <input type="date" name="date_of_joining" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Address:</label>
            <textarea name="address" class="form-control" rows="2"></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Add</button>
            <a href="{{ route('hr.dashboard') }}" class="btn btn-danger ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
