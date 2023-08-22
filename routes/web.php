<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowProfile\UserProfile;
use App\Http\Livewire\ShowQuestion\ShowQuestion;
use App\Http\Livewire\ShowSubjects\ShowSubjects;
use App\Http\Livewire\ShowRoom\ShowRoom;
use App\Http\Livewire\ShowTeacherDashboard\ShowTeacherDashboard;
use App\Http\Livewire\UserRegistration\UserRegistration;
use App\Http\Controllers\StudentPageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['role:teacher', 'auth']],function(){
    Route::get('/dashboard', ShowTeacherDashboard::class)->name('teacher.dashboard');
    Route::prefix('user-profile')->group(function (){
        Route::get('/', UserProfile::class)->name('user.profile');
    });
    Route::prefix('dashboard-question')->group(function (){
        Route::get('/', ShowQuestion::class )->name('dashboard.question');
        Route::get('/{id}',[ShowQuestion::class,'edit'])->name('question.edit');
    });
    Route::prefix('dashboard-subjects')->group(function (){
        Route::get('/', ShowSubjects::class )->name('dashboard.subjects');
    });
    Route::prefix('dashboard-room')->group(function(){
        Route::get('/', ShowRoom::class)->name('dashboard.room');
    });
    Route::prefix('dashboard-room')->group(function(){
        Route::get('/', ShowRoom::class)->name('dashboard.room');
    });
    Route::prefix('user-registration')->group(function(){
        Route::get('/', UserRegistration::class)->name('user.registration');
    });
});

Route::group(['middleware'=>['role:student', 'auth']], function(){
    Route::get('student-grade', [StudentPageController::class, 'studentGrade'])->name('student.grade');
    Route::get('student-subjects', [StudentPageController::class, 'studentSubject'])->name('student.subject');
    Route::get('student-room-list', [StudentPageController::class, 'roomList'])->name('room.list');
    Route::POST('submit-answer', [StudentPageController::class, 'submitAnswer'])->name('submit.answer');
    Route::get('student-quiz-room', [StudentPageController::class, 'studentQuiz'])->name('student.quiz');
    Route::get('/student-leaderboards', [StudentPageController::class, 'studentLeaderboards'])->name('student.leaders');
});

Route::get('/', [StudentPageController::class, 'dashboard'])->name('student.dashboard');



require __DIR__.'/auth.php';

