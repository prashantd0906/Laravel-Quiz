<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Auth;

Route::get('/', function () {
    return redirect('/login');
})->name('/');

// Auth Routes
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/quiz', [QuizController::class, 'showQuiz'])->name('quiz.show');
    Route::post('/quiz/submit', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
    Route::get('/result', [QuizController::class, 'showResult']);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->middleware('auth', 'admin')
        ->name('admin.dashboard');

    Route::get('/admin/user/{id}/edit', [AdminController::class, 'edit'])->name('admin.user.edit');
    Route::post('/admin/user/{id}/update', [AdminController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])->name('admin.user.delete');
});
