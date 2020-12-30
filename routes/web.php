<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::redirect('/','post');
Route::resource('post',PostController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
