<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ComicsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',                             [HomeController::class, 'index']);
Route::get('/login',                        [AuthController::class, 'logIn'])->name('login');
Route::post('/login',                       [AuthController::class, 'signIn']);
Route::get('/logout',                       [AuthController::class, 'logOut']);

Route::get('/register',                     [AuthController::class, 'register'])->name('register');
Route::post('/register',                    [AuthController::class, 'signUp'])->middleware('checkPassword');

Route::get('/forgot_password',              [AuthController::class, 'forgotPassword']);
Route::post(('/forgot_password'),           [AuthController::class, 'takePassword']);

Route::post('/search',            [HomeController::class, 'search']);



Route::group(['prefix' => 'comic'], function () {
    Route::get('{id}',                      [HomeController::class, 'details']);
    Route::get('{id}/chapter/{chapter_id}', [HomeController::class, 'viewChapter']);
});

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'checkRole']
], function () {
    Route::get('/',                     [HomeController::class, 'dashboard']);
    Route::get('/users',                [AuthController::class, 'getList']);
    Route::get('/users/create',         [AuthController::class, 'adminRegister']);
    Route::post('/users/create',        [AuthController::class, 'adminSignUp']);
    Route::get('/users/details/{id}',   [AuthController::class, 'details']);
    Route::get('/users/edit/{id}',      [AuthController::class, 'edit']);
    Route::post('/users/edit/{id}',     [AuthController::class, 'updateUser']);
    Route::get('/users/delete/{id}',    [AuthController::class, 'deleteUser']);

    Route::get('/categories',           [CategoryController::class, 'getCategories']);
    Route::get('/categories/create',    [CategoryController::class, 'createCategories']);
    Route::post('/categories/create',   [CategoryController::class, 'storeCategories']);
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);
    Route::put('/categories/edit/{id}', [CategoryController::class, 'updateCategory']);
    Route::get('/categories/delete/{id}', [CategoryController::class, 'deleteCategory']);

    Route::get('/comics',               [ComicsController::class, 'getComics']);
    Route::get('/comics/create',        [ComicsController::class, 'createComic']);
    Route::post('/comics/create',       [ComicsController::class, 'storeComic']);
    Route::get('/comics/details/{id}',  [ComicsController::class, 'details'])->name('details');
    Route::get('/comics/details/{id}/addchapter',  [ChapterController::class, 'addChapter']);
    Route::post('/comics/details/{id}/addchapter',  [ChapterController::class, 'storeChapter']);
    Route::get('/comics/edit/{id}',     [ComicsController::class, 'edit']);
    Route::put('/comics/edit/{id}',     [ComicsController::class, 'updateComic']);
    Route::get('/comics/delete/{id}',   [ComicsController::class, 'deleteComic']);


    Route::get('/authors',              [AuthorController::class, 'getAuthors']);
    Route::get('/authors/create',       [AuthorController::class, 'createAuthor']);
    Route::post('/authors/create',      [AuthorController::class, 'storeAuthor']);
    Route::get('/authors/details/{id}', [AuthorController::class, 'details']);
    Route::get('/authors/edit/{id}',    [AuthorController::class, 'edit']);
    Route::put('/authors/edit/{id}',    [AuthorController::class, 'updateAuthor']);
    Route::get('/authors/delete/{id}',  [AuthorController::class, 'deleteAuthor']);
});
