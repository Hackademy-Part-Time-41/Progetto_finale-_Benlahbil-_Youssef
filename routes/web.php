<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;

Route::middleware('writer')->group(function () {
    Route::get('/writer/dashboard', [WriterController::class, 'dashboard'])->name('writer.dashboard');
    Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('article.update');


});

Route::get('/homepage', [PageController::class, 'home'])->name('homepage');

  

