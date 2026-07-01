<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/articles/{slug}', [ArticleController::class,'list'])->name('articles');
Route::get('/article/{article}', [ArticleController::class,'single'])->name('article');
Route::post('/comment', [CommentController::class,'store'])->name('comment.store');
Route::fallback(function (){return view('frontend.errors.404');});
