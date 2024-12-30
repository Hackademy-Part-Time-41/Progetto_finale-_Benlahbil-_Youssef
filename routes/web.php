<?php

use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;

Route::middleware('writer')->group(function () {
    Route::get('/writer/dashboard', [WriterController::class, 'dashboard'])->name('writer.dashboard');
});
