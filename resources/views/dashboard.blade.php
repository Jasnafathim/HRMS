@extends('layouts.sidebar')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Welcome, Admin!</h2>
    </div>

    <div class="container">
        <div class="row">
            
            <!-- Total Employees -->
            <div class="col-md-6 mb-4">
                <div class="card shadow text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Employees</h5>
                        <h3>{{ $totalEmployees ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <!-- Total HRs -->
            <div class="col-md-6 mb-4">
                <div class="card shadow text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Total HRs</h5>
                        <h3>{{ $totalHRs ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <!-- Total Departments -->
            <div class="col-md-6 mb-4">
                <div class="card shadow text-white bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Total Departments</h5>
                        <h3>{{ $totalDepartments ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
