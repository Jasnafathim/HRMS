@extends('layouts.hr-sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4 text-center">Employee Performance</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $emp)
                <tr>
                    <td>{{ $emp->name }}</td>
                    <td>{{ $emp->email }}</td>
                    <td>{{ $emp->department }}</td>
                    <td>
                        @if($emp->rating)
                            {{ str_repeat('⭐', $emp->rating) }}
                        @else
                            <span class="text-muted">No Rating</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-muted">No employees found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
