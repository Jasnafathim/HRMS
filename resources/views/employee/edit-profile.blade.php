@extends('layouts.employee-sidebar')

@section('content')
<h4 class="mb-0">Edit Profile</h4>
<div class="container mt-5">
    
        <div class="card-header bg-info text-white">
            
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('employee.profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $employee->name }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Address</label>
                    <textarea name="address" class="form-control" required>{{ $employee->address }}</textarea>
                </div>
                <div class="text-end p-2 text-center" >
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('employee.dashboard') }}" class="btn btn-danger">Cancel</a>
                </div>

            </form>
        </div>
    
</div>
@endsection
