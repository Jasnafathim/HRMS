@extends('layouts.hr-sidebar')

@section('content')
<div class="container mt-4">
    <h3 class="text-center mb-3">Mark Attendance - {{ Auth::guard('hr')->user()->department }}</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form action="{{ route('hr.attendance.store') }}" method="POST">
        @csrf

        <!-- Attendance Date Input -->
        <div class="mb-3">
            <label for="date" class="form-label">Select Date:</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Sl No</th>
                    <th>Employee Name</th>
                    <th>Attendance</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $index => $emp)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $emp->name }}</td>
                        <td>
                            <select name="attendance[{{ $emp->id }}]" class="form-select">
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary ">Submit Attendance</button>
        <a href="{{ route('hr.dashboard') }}" class="btn btn-danger ms-2">Cancel</a>
    </form>
</div>
@endsection
