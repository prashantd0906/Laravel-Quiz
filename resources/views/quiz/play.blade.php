@extends('layouts.app')

@section('title', 'Quiz')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>{{ $quiz->title }}</h4>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('quiz.submit') }}">
                    @csrf
                    @foreach ($quiz->questions as $question)
                        <div class="mb-4">
                            <h5>{{ $loop->iteration }}. {{ $question->question }}</h5>
                            @php
                                $options = [
                                    'a' => $question->option_a,
                                    'b' => $question->option_b,
                                    'c' => $question->option_c,
                                    'd' => $question->option_d
                                ];
                            @endphp
                            @foreach ($options as $key => $value)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" 
                                           name="answers[{{ $question->id }}]" 
                                           value="{{ $key }}" 
                                           id="q{{ $question->id }}_{{ $key }}">
                                    <label class="form-check-label" for="q{{ $question->id }}_{{ $key }}">
                                        {{ $value }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-success w-100">Submit Quiz</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
