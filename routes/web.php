<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class,'index']);
Route::get('/job/{id}/show', [JobController::class,'show']);

Route::middleware('auth')->group(function () {
    // profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class,'index']);
        Route::get('/edit', [ProfileController::class,'edit']);
        Route::put('/edit', [ProfileController::class,'update']);
        Route::get('/{id}/view', [ProfileController::class,'view']);
    });
    // job
    Route::prefix('/job')->group(function () {
        Route::post('/', [JobController::class,'index']);
        Route::get('/create', [JobController::class,'create']);
        Route::post('/create', [JobController::class,'store']);
        Route::post('/interview', [JobController::class,'interview']);
        Route::post('/rejected', [JobController::class,'rejected']);
    });
    Route::get('logout', [LoginController::class,'logout']);
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class,'index']);
    Route::post('register', [RegisterController::class,'register']);

    Route::get('login', [LoginController::class,'index'])->name('login');
    Route::post('login', [LoginController::class,'login']);
});


