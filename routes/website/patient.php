<?php


Route::middleware('guest:web')->group(function () {
    Route::get('/login', [App\Http\Controllers\Patient\LoginController::class, 'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\Patient\LoginController::class, 'processLogin'])->name('processLogin');
});

Route::middleware('auth:web')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Patient\LoginController::class, 'logout'])->name('logout');

    Route::get('/home', [App\Http\Controllers\Patient\LoginController::class, 'home'])->name('home');
});