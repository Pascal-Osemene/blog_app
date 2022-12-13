<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/', [PostController::class, 'index'])->name('posts.index');
// Route::post('/', [PostController::class, 'store'])->name('posts.store');
Route::apiResource('posts', PostController::class)->except('show');
Route::get('posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::post('register', RegisterController::class)->name('api.register');
Route::post('login', loginController::class)->name('api.login');
