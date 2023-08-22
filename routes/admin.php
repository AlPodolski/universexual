<?php

use App\Http\Controllers\Admin\AuthController;

//Admin\AuthController@index
Route::get('login', [AuthController::class, 'index']);
Route::post('login_process', [AuthController::class, 'login']);

Route::middleware('admin:admin')->group(function (){

    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index']);

    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);

    Route::post('/posts/check', [\App\Http\Controllers\Admin\PostController::class, 'check']);

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    Route::get('/claim', [\App\Http\Controllers\Admin\ClaimController::class, 'index']);

/*


    Route::get('/claim/delete', 'Admin\ClaimController@delete');

    Route::post('/comments/delete', 'Admin\CommentController@delete');
    Route::post('/comments/check', 'Admin\CommentController@check');
    Route::resource('comments', 'Admin\CommentController');


    Route::post('/post/delete', 'Admin\PostController@delete');
    */

});


