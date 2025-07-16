@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4 text-center">Edit Leave</h3>

    <form action="{{ route('leave.update', $leave->id) }}" method="POST" class="card p-4 shadow">
        @csrf
        <div class="mb-3">
            <label class="form-label">Leave Name</label>
            <input type="text" name="leave_name" class="form-control" value="{{ $leave->leave_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Number of Leaves</label>
            <input type="number" name="leave_number" class="form-control" value="{{ $leave->leave_number }}" min="1" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('leave.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
