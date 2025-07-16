@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4">Leave Types</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Sl No</th>
                <th>Leave Name</th>
                <th>Number of Leaves</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
                <tr>
                    <td>{{ $leave->id }}</td>
                    <td>{{ $leave->leave_name }}</td>
                    <td>{{ $leave->leave_number }}</td>
                    <td>
                        <a href="{{ route('leave.edit', $leave->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('leave.delete', $leave->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this leave?')">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
