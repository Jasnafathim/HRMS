@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4 text-center">Add Department</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form action="{{ route('department.store') }}" method="POST" class="card p-4 shadow">
        @csrf
        <div class="mb-3">
            <label class="form-label">Department Name</label>
            <input type="text" name="name" class="form-control" placeholder="e.g. Finance, HR, IT" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Add</button>
            <a href="{{ url('/admin/dashboard') }}" class="btn btn-danger ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
