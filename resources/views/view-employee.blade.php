@extends('layouts.sidebar') 

@section('content')
<div class="container mt-4">
    <h3 class="text-center mb-4">View Employees by Department</h3>

    <form method="POST" action="{{ route('employee.filter') }}" class="row g-3 mb-4">
        @csrf
        <div class="col-md-6">
            <label for="department" class="form-label">Select Department:</label>
            <select name="department" id="department" class="form-select" required>
                <option value="">-- Select --</option>
                @foreach($departments as $dep)
                    <option value="{{ $dep }}" {{ request('department') == $dep ? 'selected' : '' }}>{{ $dep }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 align-self-end">
            <button type="submit" class="btn btn-primary">View</button>
        </div>
    </form>

    @isset($employees)
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $index => $emp)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $emp->name }}</td>
                        <td>{{ $emp->email }}</td>
                        <td>{{ $emp->phone }}</td>
                        <td>
                            <span class="badge bg-{{ $emp->status === 'blocked' ? 'danger' : 'success' }}">
                                {{ ucfirst($emp->status) }}
                            </span>
                        </td>
                        <td>{{ $emp->rating ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
</div>
@endsection
