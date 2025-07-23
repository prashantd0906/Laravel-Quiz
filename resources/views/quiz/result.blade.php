@extends('layouts.app')

@section('title', 'Quiz Result')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h4>Quiz Result</h4>
            </div>
            <div class="card-body text-center">
                <h5>Your Score:</h5>
                <h2 class="display-4 text-primary">{{ $score }}</h2>
                <a href="{{ route('quiz.show') }}" class="btn btn-primary mt-3">Play Again</a>
                <a href="{{ route('logout') }}" class="btn btn-secondary mt-3">Logout</a>
            </div>
        </div>
    </div>
</div>
@endsection
