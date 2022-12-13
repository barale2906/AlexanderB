<?php

use App\Http\Controllers\AnnexeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLoanController;
use App\Http\Controllers\MessageController;
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

Route::apiResource('books', BookController::class)->middleware('can:book')->names('books');
Route::apiResource('bookloans', BookLoanController::class)->middleware('can:bookloan')->names('booksloans');
Route::apiResource('messages', MessageController::class)->middleware('can:message')->names('messages');
Route::apiResource('annexes', AnnexeController::class)->middleware('can:annexe')->names('annexes');
