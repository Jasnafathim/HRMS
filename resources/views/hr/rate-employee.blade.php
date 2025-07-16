@extends('layouts.hr-sidebar')

@section('content')
<div class="container">
    <h3 class="mb-4 text-center">⭐ Rate {{ $employee->name }}</h3>

    <form action="{{ route('hr.employee.rate.save', $employee->id) }}" method="POST" class="card p-4 shadow">
        @csrf
        <div class="mb-3">
            <label for="rating">Select Rating (1-5):</label>
            <select name="rating" class="form-control" required>
                <option value="">-- Select --</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $employee->rating == $i ? 'selected' : '' }}>
                        {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Save Rating</button>
            <a href="{{ route('hr.employee.performance') }}" class="btn btn-secondary ms-2">Back</a>
        </div>
    </form>
</div>
@endsection
