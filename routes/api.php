<?php

use App\Http\Controllers\AnnexeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLoanController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [LoginController::class, 'store']);

Route::post('register', [RegisterController::class, 'store'])->name('register');
/*
Route::middleware('auth:api')->group(
    function(){
        Route::apiResource('users', UserController::class)->middleware('can:user')->names('users');
        Route::apiResource('books', BookController::class)->middleware('can:book')->names('books');
        Route::apiResource('bookloans', BookLoanController::class)->middleware('can:bookloan')->names('booksloans');
        Route::apiResource('messages', MessageController::class)->middleware('can:message')->names('messages');
        Route::apiResource('annexes', AnnexeController::class)->middleware('can:annexe')->names('annexes');
    }
);*/

Route::apiResource('users', UserController::class)->names('users');
Route::apiResource('books', BookController::class)->names('books');
Route::apiResource('bookloans', BookLoanController::class)->names('booksloans');
Route::apiResource('messages', MessageController::class)->names('messages');
Route::apiResource('annexes', AnnexeController::class)->names('annexes');

