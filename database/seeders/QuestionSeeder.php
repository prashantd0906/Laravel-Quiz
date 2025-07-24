<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Create quiz if doesn't exist
        $quiz = Quiz::firstOrCreate(
            ['title' => 'General Knowledge Quiz']
        );

        Question::insert([
            [
                'quiz_id' => $quiz->id,
                'question' => 'What is the capital of France?',
                'option_a' => 'Berlin',
                'option_b' => 'Madrid',
                'option_c' => 'Paris',
                'option_d' => 'Rome',
                'correct_option' => 'c',
            ],
            [
                'quiz_id' => $quiz->id,
                'question' => 'Which planet is known as the Red Planet?',
                'option_a' => 'Earth',
                'option_b' => 'Mars',
                'option_c' => 'Jupiter',
                'option_d' => 'Venus',
                'correct_option' => 'b',
            ],
            [
                'quiz_id' => $quiz->id,
                'question' => 'Who wrote "Hamlet"?',
                'option_a' => 'Charles Dickens',
                'option_b' => 'Mark Twain',
                'option_c' => 'William Shakespeare',
                'option_d' => 'Leo Tolstoy',
                'correct_option' => 'c',
            ],
        ]);
    }
}
