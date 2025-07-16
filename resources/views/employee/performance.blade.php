@extends('layouts.employee-sidebar')

@section('content')
<div class="container">
    <h3>Performance Rating</h3>
    <p><strong>Rating:</strong>
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $employee->rating)
                ⭐
            @else
                ☆
            @endif
        @endfor
    </p>
</div>
@endsection

