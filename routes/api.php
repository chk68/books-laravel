<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('authors', [AuthorController::class, 'store'])->name('authors.store');;
Route::get('authors', [AuthorController::class, 'index']);

Route::post('books', [BookController::class, 'store'])->name('books.store');;
Route::get('books', [BookController::class, 'index']);
Route::get('books/{id}', [BookController::class, 'show']);
Route::get('books/search/{last_name}', [BookController::class, 'searchByAuthorLastName']);
Route::put('books/{id}', [BookController::class, 'update']);
