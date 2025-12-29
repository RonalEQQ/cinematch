<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MoviePageController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/chat', function () {
        return view('chat');
    })->name('chat');

    Route::get('/movies', [MoviePageController::class, 'index'])
        ->name('web.movies.index');

    Route::get('/movies/{movie}', [MoviePageController::class, 'show'])
        ->name('web.movies.show');

    Route::get('/chat', fn() => view('chat.index'))->name('chat');
    Route::get('/chat/{user}', fn(User $user) => view('chat.private', compact('user')))
        ->name('chat.user');
});


