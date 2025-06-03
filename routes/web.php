<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
 * The home route - shows tasks index page
 */
Route::get('/', [TaskController::class, 'index'])->name('home');

/*
 * Resource routes for tasks, posts, projects
 */
Route::resource('tasks', TaskController::class)->except(['index']);
Route::post('tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
Route::resource('posts', PostController::class);
Route::resource('projects', ProjectController::class);

/*
 * Static about page
 */
Route::view('/about', 'about')->name('about');

/*
 * Dashboard route (requires authentication)
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
 * Routes requiring authentication
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
