@extends('layouts.hr-sidebar')

@section('content')
<div class="container mt-4">
    <h3 class="text-center mb-4">View Attendance - {{ Auth::guard('hr')->user()->department }}</h3>

    <form method="GET" action="{{ route('hr.attendance.view') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="date" class="form-label">Select Date:</label>
                <input type="date" name="date" value="{{ request('date') }}" class="form-control" required>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">View</button>
            </div>
        </div>
    </form>

    @if($attendances->isNotEmpty())
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Attendance</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $index => $record)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $record->employee->name }}</td>
                        <td>{{ $record->employee->email }}</td>
                        <td>
                            <span class="badge bg-{{ $record->status === 'Present' ? 'success' : 'danger' }}">
                                {{ $record->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(request('date'))
        <div class="alert alert-warning text-center mt-4">
            No attendance records found for {{ request('date') }}.
        </div>
    @endif
</div>
@endsection
