@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4 text-center">Departments</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Sl No</th>
                <th>Department Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $dep)
                <tr>
                    <td>{{ $dep->id }}</td>
                    <td>{{ $dep->name }}</td>
                    <td>
                        <a href="{{ route('department.edit', $dep->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('department.delete', $dep->id) }}" class="btn btn-sm btn-danger"
                           onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
