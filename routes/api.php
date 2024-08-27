<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get ('/testing-the-api', function (Request $request) {
    return ['message' => 'hello'];
});

/* Route::get ('/posts', function (Request $request) {
    $post = Post::create(['title' =>'my first post', 'slug'=> 'my-first-post']);

    return $post;
}); */

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('posts', PostController::class);
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});

/* Route::get('posts', [PostController::class, 'index']);

DB::listen(function($query) {
    var_dump($query->sql);
}); */




