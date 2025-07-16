@extends('layouts.hr-sidebar') 

@section('content')
<div class="container">
    <h3>Welcome, {{ $hrName }} 👋</h3>
    <p>This is your HR dashboard.</p>
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

            <!-- Pending Leaves -->
            <div class="col-md-6 mb-4">
                <div class="card shadow text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Pending Leaves</h5>
                        <h3>{{ $pendingLeaves ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            
        </div>
    </div>

@endsection
