<?php

Route::middleware('guest:doctor')->group(function () {
    Route::get('/doctorLogin', [App\Http\Controllers\Doctor\LoginController::class, 'login'])->name('doctorLogin');
    Route::post('/doctorLogin', [App\Http\Controllers\Doctor\LoginController::class, 'processLogin'])->name('doctorProcessLogin');
});

Route::middleware('auth:doctor')->group(function () {
    Route::post('/doctorLogout', [App\Http\Controllers\Doctor\LoginController::class, 'logout'])->name('doctorLogout');

    Route::get('/doctorHome', [App\Http\Controllers\Doctor\LoginController::class, 'home'])->name('doctorHome');
});