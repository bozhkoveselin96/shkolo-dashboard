<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ButtonController;

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

Route::get('/', [ButtonController::class, 'index'])->name('dashboard');
Route::get('/create', [ColorController::class, 'index']);
Route::get('/buttons', [ButtonController::class, 'store']);
Route::resource('buttons', ButtonController::class)->except('index','store','show','create');
