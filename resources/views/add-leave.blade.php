@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4 text-center">Add Leave Type</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leave.store') }}" method="POST" class="card p-4 shadow">
        @csrf
        <div class="mb-3">
            <label class="form-label">Leave Name</label>
            <input type="text" name="leave_name" class="form-control" placeholder="e.g. Casual Leave" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Number of Leaves</label>
            <input type="number" name="leave_number" class="form-control" placeholder="e.g. 12" min="1" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Add</button>
            <a href="{{ url('/admin/dashboard') }}" class="btn btn-danger ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
