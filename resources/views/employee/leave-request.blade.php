@extends('layouts.employee-sidebar')

@section('content')

<div class="container">
    <h3>Apply for Leave</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('leave.submit') }}">
        @csrf

        <div class="mb-3">
            <label>Leave Type</label>
            <select name="leave_type" class="form-control" required>
                <option value="">-- Select Leave Type --</option>
                @foreach($leaveTypes as $type)
                    <option value="{{ $type->leave_name }}">
                        {{ $type->leave_name }} ({{ $type->leave_number }} days)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Reason</label>
            <textarea name="reason" class="form-control" required></textarea>
        </div>
        <div class="text-end p-2 text-center" >
            <button type="submit" class="btn btn-primary">Apply</button>
            <a href="{{ route('employee.dashboard') }}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection

