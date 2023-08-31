<?php

use App\Http\Controllers\Admin\AuthController;

//Admin\AuthController@index
Route::get('login', [AuthController::class, 'index']);
Route::post('login_process', [AuthController::class, 'login']);

Route::middleware('admin:admin')->group(function (){

    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index']);

    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);

    Route::resource('obmenka', \App\Http\Controllers\Admin\ObmenkaController::class);

    Route::post('/posts/check', [\App\Http\Controllers\Admin\PostController::class, 'check']);

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    Route::get('/claim', [\App\Http\Controllers\Admin\ClaimController::class, 'index']);
    Route::get('/cache', [\App\Http\Controllers\Admin\CacheController::class, 'index']);

    Route::post('/claim/delete', [\App\Http\Controllers\Admin\ClaimController::class, 'index']);

    Route::resource('comments',\App\Http\Controllers\Admin\CommentController::class);

    Route::post('/comments/delete', [\App\Http\Controllers\Admin\CommentController::class, 'delete']);
    Route::post('/comments/check', [\App\Http\Controllers\Admin\CommentController::class, 'check']);

/*

    Route::post('/post/delete', 'Admin\PostController@delete');
    */

});


