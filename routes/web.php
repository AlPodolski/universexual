<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/review/add', \App\Http\Controllers\ReviewController::class);
Route::post('/message/add', [\App\Http\Controllers\MessagesController::class, 'store']);

Route::get('/{size}/thumbs/{path}', ImageController::class)
    ->where('size', '.*')->where('path', '.*');

Route::domain('{city}.'.env('DOMAIN'))->group(function () {
    Route::get('/politika-konfidencialnosti', [\App\Http\Controllers\CustomController::class, 'politic']);
    Route::get('/', \App\Http\Controllers\IndexController::class);
    Route::post('/',  [\App\Http\Controllers\IndexController::class, 'more']);
    Route::get('/post/{url}', \App\Http\Controllers\PostController::class);
    Route::get('/poisk',  \App\Http\Controllers\SearchController::class);
    Route::get('/filter',  [\App\Http\Controllers\SearchController::class, 'filter']);
    Route::get('/sitemap.xml',  \App\Http\Controllers\SiteMapController::class);

    Route::get('/robots.txt', \App\Http\Controllers\RobotController::class);

    Route::get('/{search}',  \App\Http\Controllers\FilterController::class)
        ->where('search', '.*');

    Route::post('/{search}',  [\App\Http\Controllers\FilterController::class, 'more'])
        ->where('search', '.*');
});


