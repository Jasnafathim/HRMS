@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4 text-center">Edit Department</h3>

    <form action="{{ route('department.update', $department->id) }}" method="POST" class="card p-4 shadow">
        @csrf
        <div class="mb-3">
            <label class="form-label">Department Name</label>
            <input type="text" name="name" class="form-control" value="{{ $department->name }}" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('department.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
