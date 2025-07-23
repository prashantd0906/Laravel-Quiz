<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function showQuiz()
    {
        $quiz = Quiz::with('questions')->first();
        if (!$quiz) {
            return redirect()->back()->with('error', 'No quiz found.');
        }
        return view('quiz.play', compact('quiz'));
    }

    public function submitQuiz(Request $request)
    {
        $quiz = Quiz::with('questions')->first();
        if (!$quiz) {
            return redirect()->back()->with('error', 'No quiz found.');
        }
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in to play the quiz');
        }
        $score = 0;

        foreach ($quiz->questions as $question) {
            $selectedAnswer = $request->input('answers.' . $question->id);
            if ($selectedAnswer && $selectedAnswer == $question->correct_option) {
                $score++;
            }
        }
        Result::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id
            ],
            [
                'score' => $score
            ]
        );

        return redirect('/result')->with('score', $score);
    }

    public function showResult()
    {
        $score = session('score');
        if ($score === -1) {
        return redirect('/quiz')->with('error', 'Please attempt the quiz first.');
    }
        return view('quiz.result', compact('score'));
    }
}
