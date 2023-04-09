<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('posts/', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    
Route::middleware('guest')->group(function () {
  Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
  Route::post('/register-process', [AuthController::class, 'register'])->name('register.process');

  Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login-process', [AuthController::class, 'login'])->name('login.process');

  Route::get('/forgot', [AuthController::class, 'showForgotForm'])->name('forgot');
  Route::post('/forgot-process', [AuthController::class, 'forgot'])->name('forgot.process');
});

Route::middleware('auth')->group(function () {
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->middleware('auth')->group(function () {
  Route::get('posts', [AdminController::class, 'index'])->name('admin.posts');
  Route::get('posts/create', [AdminController::class, 'create'])->name('admin.posts.create');
  Route::post('posts', [AdminController::class, 'store'])->name('admin.posts.store');
  Route::get('posts/{post}', [AdminController::class, 'show'])->name('admin.posts.show');
  Route::get('posts/{post}/edit', [AdminController::class, 'edit'])->name('admin.posts.edit');
  Route::patch('posts/{post}', [AdminController::class, 'update'])->name('admin.posts.update');
  Route::delete('posts/{post}', [AdminController::class, 'destroy'])->name('admin.posts.delete');
});

