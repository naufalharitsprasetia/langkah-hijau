<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HijauAIController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;

Route::get('/', function () { });
Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog']);
});

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

//
Route::get('/edu-zone', [PostController::class, 'index'])->name('post.index');
Route::get('/edu-zone/{post}', [PostController::class, 'show'])->name('post.show');

// Quiz
// Route::middleware(['auth'])->group(function () { // Opsional: Tambahkan middleware 'auth' jika quiz hanya untuk user login
Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
Route::get('/quizzes/{quiz}/start', [QuizController::class, 'start'])->name('quizzes.start');
// Rute baru untuk menampilkan soal individual
Route::get('/quizzes/{quiz}/question/{question}', [QuizController::class, 'showQuestion'])->name('quizzes.question');
Route::post('/quizzes/{quiz}/question/{question}/submit', [QuizController::class, 'submitAnswer'])->name('quizzes.submit_answer');
Route::get('/quizzes/{quiz}/results', [QuizController::class, 'results'])->name('quizzes.results');
// });

// Hijau AI
Route::get('/hijau-ai', [HijauAIController::class, 'index'])->name('hijau-ai.index');
Route::post('/hijau-ai', [HijauAIController::class, 'ask'])->name('hijau-ai.ask');
// Route::post('/tani-ai', [TaniController::class, 'chat'])->name('tani.chat')->middleware('req_auth');

// Auth for guest
Route::middleware('guest')->group(function () {
    Route::get('/req-auth', [AuthController::class, 'reqAuth'])->name('auth.reqAuth');
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::get('/sign-up', [AuthController::class, 'signup'])->name('auth.signup');
    Route::post('/sign-up', [AuthController::class, 'addUser'])->name('auth.addUser');
});

// Auth for user logged in
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/leaderboard', [UserController::class, 'leaderboard'])->name('user.leaderboard');
    Route::get('/hijau-ai', [HijauAIController::class, 'index'])->name('hijau-ai.index');
    Route::post('/hijau-ai', [HijauAIController::class, 'ask'])->name('hijau-ai.ask');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::get('/edu-zone', [PostController::class, 'index'])->name('post.index');
Route::get('/edu-zone/{post}', [PostController::class, 'show'])->name('post.show');
// Products
Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/edu-zone-manage', [PostController::class, 'manage'])->name('post.manage');
    Route::get('/edu-zone-create', [PostController::class, 'create'])->name('post.create');
});

// challenge
Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
Route::get('/challenges/{challenge}', [ChallengeController::class, 'show'])->name('challenges.show');