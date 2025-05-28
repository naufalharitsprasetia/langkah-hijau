<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HijauAIController;
use App\Http\Controllers\ChallengeController;

// // php artisan storage:link untuk hosting
// Route::get('/create-storage-link', function () {
//     $targetFolder = base_path('storage/app/public'); // Folder tujuan
//     $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage'; // Lokasi symbolic link di public_html

//     if (file_exists($linkFolder)) {
//         return 'Link folder sudah ada.';
//     }

//     try {
//         symlink($targetFolder, $linkFolder); // Membuat symbolic link
//         return 'Symlink berhasil dibuat.';
//     } catch (Exception $e) {
//         return 'Gagal membuat symlink: ' . $e->getMessage();
//     }
// });

// Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('home.tentang');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('home.kontak');

Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
Route::get('/quizzes/{quiz}/start', [QuizController::class, 'start'])->name('quizzes.start');
// Rute baru untuk menampilkan soal individual
Route::get('/quizzes/{quiz}/question/{question}', [QuizController::class, 'showQuestion'])->name('quizzes.question');
Route::post('/quizzes/{quiz}/question/{question}/submit', [QuizController::class, 'submitAnswer'])->name('quizzes.submit_answer');
Route::get('/quizzes/{quiz}/results', [QuizController::class, 'results'])->name('quizzes.results');

// Auth for guest
Route::middleware('guest')->group(function () {
    // auth
    Route::get('/req-auth', [AuthController::class, 'reqAuth'])->name('auth.reqAuth');
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::get('/sign-up', [AuthController::class, 'signup'])->name('auth.signup');
    Route::post('/sign-up', [AuthController::class, 'addUser'])->name('auth.addUser');
});

// Auth for user logged in
Route::middleware('auth')->group(function () {
    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    // users
    Route::get('/leaderboard', [UserController::class, 'leaderboard'])->name('user.leaderboard');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    // hijau AI
    Route::get('/hijau-ai', [HijauAIController::class, 'index'])->name('hijau-ai.index');
    Route::post('/hijau-ai', [HijauAIController::class, 'ask'])->name('hijau-ai.ask');
    // event
    Route::get('/event-ajukan', [EventController::class, 'ajukan'])->name('event.ajukan');
    Route::post('/event-ajukan', [EventController::class, 'simpanAjuan'])->name('event.simpanAjuan');
});
// edu zone
Route::get('/edu-zone', [PostController::class, 'index'])->name('post.index');
Route::get('/edu-zone/{post}', [PostController::class, 'show'])->name('post.show');
// event
Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');
// IS ADMIN Middleware
Route::middleware([IsAdmin::class])->group(function () {
    // Edu Zone
    Route::get('/edu-zone-manage', [PostController::class, 'manage'])->name('post.manage');
    Route::get('/edu-zone-create', [PostController::class, 'create'])->name('post.create');
    Route::post('/edu-zone-create', [PostController::class, 'store'])->name('post.store');
    Route::get('/edu-zone-edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/edu-zone-edit/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/edu-zone-delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    // Events
    Route::get('/event-listAjuan', [EventController::class, 'listAjuan'])->name('event.listAjuan');
    Route::get('/event-accAjuan/{id}/', [EventController::class, 'accAjuan'])->name('event.accAjuan');
    Route::delete('/event-destroyAjuan/{event}', [EventController::class, 'destroyAjuan'])->name('event.destroyAjuan');
    Route::get('/event-manage', [EventController::class, 'manage'])->name('event.manage');
    Route::get('/event-create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event-create', [EventController::class, 'store'])->name('event.store');
    Route::get('/event-edit/{event}', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event-edit/{event}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event-delete/{event}', [EventController::class, 'destroy'])->name('event.destroy');
});

// challenge
Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
Route::get('/challenges/{challenge}', [ChallengeController::class, 'show'])->name('challenges.show');
Route::post('/challenges/{challenge}/participate', [ChallengeController::class, 'participate'])->name('challenges.participate');
Route::get('/challenges/{participation}/progress', [ChallengeController::class, 'progress'])->name('challenges.progress');