@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4">HR List</h3>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-white bg-danger shadow">
                <div class="card-body">
                    <h5 class="card-title">Blocked HRs</h5>
                    <h3>{{ $blockedCount }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5 class="card-title">Unblocked HRs</h5>
                    <h3>{{ $unblockedCount }}</h3>
                </div>
            </div>
        </div>
    </div>


    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Department</th><th>Joining Date</th>
                <th>Phone</th><th>Address</th><th>Status</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hrs as $hr)
                <tr>
                    <td>{{ $hr->id }}</td>
                    <td>{{ $hr->name }}</td>
                    <td>{{ $hr->email }}</td>
                    <td>{{ $hr->department }}</td>
                    <td>{{ $hr->joining_date }}</td>
                    <td>{{ $hr->phone }}</td>
                    <td>{{ $hr->address }}</td>
                    <td>
                        @if($hr->status)
                            <span class="badge bg-success">Unblocked</span>
                        @else
                            <span class="badge bg-danger">Blocked</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('hr.toggle', $hr->id) }}" class="btn btn-sm {{ $hr->status ? 'btn-danger' : 'btn-success' }}">
                            {{ $hr->status ? 'Block' : 'Unblock' }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
