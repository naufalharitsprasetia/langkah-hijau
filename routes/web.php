<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HijauAIController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get('/', function () {});
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
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('home.dashboard');

//
Route::get('/edu-zone', [PostController::class, 'index'])->name('post.index');
Route::get('/edu-zone/show', [PostController::class, 'show'])->name('post.show');

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
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// Products
// Route::middleware([IsAdmin::class])->group(function () {
//     Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
// });