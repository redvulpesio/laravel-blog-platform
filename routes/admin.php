<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PanelController;
use Illuminate\Support\Facades\Route;


Route::get('/', PanelController::class)->name('admin.panel');
Route::resource('/users', UserController::class)->names('admin.users');
Route::get('/set_roles/{user}', [UserController::class, 'setRoles'])->name('admin.users.set_roles');
Route::post('/set_roles/{user}', [UserController::class, 'setRolesStore'])->name('admin.users.set_roles_store');
Route::resource('/categories', CategoryController::class)->names('admin.categories');
Route::resource('/articles', ArticlesController::class)->names('admin.articles');
Route::resource('/roles', RoleController::class)->names('admin.roles');
Route::post('/ckeditor_image', [ArticlesController::class, 'ckeditorImage'])->name('ckeditor.upload');
Route::get('/comments', [CommentController::class, 'comments'])->name('admin.comments');
Route::get('/accept_comment/{comment}', [CommentController::class, 'acceptComment'])->name('admin.comment.accept');
Route::get('/reject_comment/{comment}', [CommentController::class, 'rejectComment'])->name('admin.comment.reject');
Route::get('/reply_comment/{comment}', [CommentController::class, 'viewComment'])->name('admin.comment.reply');
Route::post('/reply_comment/{comment}', [CommentController::class, 'setReply'])->name('admin.comment.setReply');
Route::delete('/reply_comment/{comment}', [CommentController::class, 'deleteReply'])->name('admin.comment.deleteReply');
Route::fallback(function (){return view('admin.errors.404');});
