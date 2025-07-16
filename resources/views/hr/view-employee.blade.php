@extends('layouts.hr-sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4 text-center">Employee List</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Sl no</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Date of Joining</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Status</th>
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
            <td>{{ $emp->phone }}</td>
            <td>{{ $emp->address }}</td>
            <td>
                <span class="badge bg-{{ $emp->status === 'blocked' ? 'danger' : 'success' }}">
                    {{ ucfirst($emp->status) }}
                </span>
            </td>
            <td>
                <a href="{{ route('hr.employee.toggle', $emp->id) }}" class="btn btn-sm btn-outline-{{ $emp->status === 'blocked' ? 'success' : 'danger' }}">
                    {{ $emp->status === 'blocked' ? 'Unblock' : 'Block' }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
