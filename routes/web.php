<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [WelcomeController::class, 'index'])-> name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Posts
Route::post('/posts/store',[PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{postId}/show',[PostController::class, 'show'])->name('posts.show');
Route::get('/posts/all', [DashboardController::class, 'allPosts'])->name('posts.all');
Route::get('/posts/{postId}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/{postId}/update', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{postId}/delete', [PostController::class, 'delete'])->name('posts.delete');
