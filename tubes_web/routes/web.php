<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reportController;

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

Route::get('/', [reportController::class, 'index']);

Route::get('report/search', [reportController::class, 'search'])->name('search');
Route::resource('report', reportController::class);