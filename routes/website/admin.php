<?php

Route::middleware('guest:admin')->group(function () {
    Route::get('/adminLogin', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('adminLogin');
    Route::post('/adminLogin', [App\Http\Controllers\Admin\LoginController::class, 'processLogin'])->name('adminProcessLogin');
});

Route::middleware('auth:admin')->group(function () {
    Route::post('/adminLogout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('adminLogout');

    Route::get('/adminHome', [App\Http\Controllers\Admin\LoginController::class, 'home'])->name('adminHome');
});