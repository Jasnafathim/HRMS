@extends('layouts.employee-sidebar')

@section('content')
<!-- <div class="container"> -->
    <!-- <h3>Profile</h3>
    <p><strong>Name:</strong> {{ $employee->name }}</p>
    <p><strong>Email:</strong> {{ $employee->email }}</p>
    <p><strong>Department:</strong> {{ $employee->department }}</p>
    <p><strong>Phone:</strong> {{ $employee->phone }}</p>
    <p><strong>Address:</strong> {{ $employee->address }}</p> -->

<h3>Profile</h3>
<div class="container mt-5">
    <div class="card-body">
            <table class="table table-bordered mb-0">
                <tr>
                    <th>Name</th>
                    <td>{{ $employee->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $employee->email }}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>{{ $employee->department }}</td>
                </tr>
                <tr>
                    <th>Date of Joining</th>
                    <td>{{ $employee->date_of_joining }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $employee->phone }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $employee->address }}</td>
                </tr>

            </table>
            <div class="text-end p-2 text-center" >
                <a href="{{ route('employee.profile.edit') }}" class="btn btn-warning ">Edit Profile</a>
                <a href="{{ route('employee.dashboard') }}" class="btn btn-danger ">Cancel</a>
            </div>
        </div>
        
    </div>
</div>
@endsection
