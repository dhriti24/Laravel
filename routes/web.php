<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = [];
    if(auth()->check()){
        $posts = auth()->user()->posts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/createPosts', [PostsController::class, 'createPosts']);

Route::get('/editPost/{post}', [PostsController::class, 'editPostScreen']);

Route::put('/editPost/{post}', [PostsController::class, 'updateEditPostScreen']);

Route::delete('/deletePost/{post}', [PostsController::class, 'deletePost']);

