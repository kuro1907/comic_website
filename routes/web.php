<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComicsController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [HomeController::class, 'index']);
Route::group(['prefix' => 'comic'], function () {
    Route::get('{id}', [HomeController::class, 'details']);
    Route::get('{id}/chapter/{chapter_id}', [HomeController::class, 'viewChapter']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/users', function () {
        return view('dashboard.user.list');
    });
    Route::get('/categories', [CategoryController::class, 'getCategories']);

    Route::get('/comics', [ComicsController::class, 'getComics']);

    Route::get('/authors', [AuthorController::class, 'getAuthors']);
    Route::get('/authors/create', [AuthorController::class, 'createAuthor']);
    Route::post('/authors/create', [AuthorController::class, 'storeAuthor']);
});
