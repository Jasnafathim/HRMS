@extends('layouts.employee-sidebar') 

@section('content')
<div class="container">
    <h3 class="text-center">Welcome, {{ $employee->name }}!</h3>
    
</div>

<div class="container">
    <div class="row">

        <!-- Department -->
        <div class="col-md-6 mb-4">
            <div class="card shadow text-white bg-success">
                <div class="card-body text-center">
                    <h5 class="card-title">Department</h5>
                    <h3>{{ $employee->department }}</h3>
                </div>
            </div>
        </div>

            

<!-- Total Leaves Taken -->
<div class="col-md-6 mb-4">
    <div class="card shadow text-white bg-primary">
        <div class="card-body text-center">
            <h5 class="card-title">Total Leaves Applied</h5>
            <h3>{{ $totalLeaveDays }}</h3>
        </div>
    </div>
</div>
         
        </div>
    </div>


@endsection
