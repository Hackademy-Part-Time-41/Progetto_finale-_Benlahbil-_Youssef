<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WriterController;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;










Route::middleware('writer')->group(function(){
    Route::get('/writer/dashboard', [WriterController::class, 'dashboard'])->name('writer.dashboard');
    Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/article/store', [ArticleController::class, 'store'])->name('article.store');
});

Route::get('/homepage',[PageController::class,'home'])->name('homepage');
Route::get('/feedback',[PageController::class, 'feedback'])->name('feedback');
Route::post('/feedback',[PageController::class, 'feedbackSend'])->name('feedback.send');






  

