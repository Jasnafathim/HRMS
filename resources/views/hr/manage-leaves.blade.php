@extends('layouts.hr-sidebar')

@section('content')
<div class="container mt-4">
    <h3 class="text-center mb-4">Manage Leave Requests - {{ Auth::guard('hr')->user()->department }}</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Sl No</th>
                <th>Employee Name</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Days</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaveRequests as $index => $leave)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $leave->employee->name }}</td>
                    <td>{{ $leave->leave_type }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ \Carbon\Carbon::parse($leave->start_date)->diffInDays($leave->end_date) + 1 }}</td>
                    <td>{{ $leave->reason }}</td>
                    <td>
                        <span class="badge bg-{{ $leave->status === 'approved' ? 'success' : ($leave->status === 'rejected' ? 'danger' : 'warning') }}">
                            {{ ucfirst($leave->status) }}
                        </span>
                    </td>
                    <td>
    <form action="{{ route('hr.leaves.toggle', $leave->id) }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-sm btn-outline-{{ $leave->status === 'approved' ? 'danger' : 'success' }}">
            {{ $leave->status === 'approved' ? 'Reject' : 'Approve' }}
        </button>
    </form>
</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
