@extends('layouts.hr-sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4 text-center">Employee Performance</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Sl no</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Date of Joining</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $emp)
            <tr>
                <td>{{ $emp->id }}</td>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->email }}</td>
                <td>{{ $emp->department }}</td>
                <td>{{ $emp->date_of_joining }}</td>
                <td>
                    @if($emp->rating)
                        {{ str_repeat('⭐', $emp->rating) }} ({{ $emp->rating }}/5)
                    @else
                        <span class="text-muted">Not rated</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('hr.employee.rate', $emp->id) }}" class="btn btn-sm btn-primary">Add/Update Rating</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
