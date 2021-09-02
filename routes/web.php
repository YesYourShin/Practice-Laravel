<?php

use App\Http\Controllers\PostsController;
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

Route::get('/', function () {
    return view('welcome');
    // return "Hi";
});

Route::get('/layout', function () {
    return view('layouts.app');
});

Route::get('/hello', function () {
    return view('layouts.hello');
});

// Route::get('/posts', [PostsController::Class, 'index']);
// Route::get('/create', [PostsController::Class, 'create']);
// Route::post('/store', [PostsController::Class, 'store']);

Route::resource('/posts', PostsController::Class);
