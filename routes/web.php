<?php

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
