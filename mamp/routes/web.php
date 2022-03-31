<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    // return view('welcome');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/selectData', [HomeController::class, 'selectData'])->name('selectData');
Route::post('/editData', [HomeController::class, 'editData'])->name('editData');

Route::get('/selectSheet', [HomeController::class, 'selectSheet'])->name('selectSheet');
Route::post('/editSheet', [HomeController::class, 'editSheet'])->name('editSheet');
