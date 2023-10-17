<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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
    return view('auth/login');
});

Auth::routes();
Route::resource('dashboard', DashboardController::class)->middleware('can:isAdmin');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/json', [\App\Http\Controllers\UserController::class, 'json'])->name('user.json');
Route::resource('category', CategoryController::class)->middleware('can:isAdmin');
Route::resource('product', ProductController::class)->middleware('can:isAdmin');
Route::resource('catalog', CatalogController::class)->only('index');


Route::resource('user', UserController::class)->middleware('can:isAdmin');

Route::resource('opd', OpdController::class)->middleware('can:isAdmin');
Route::get('/opd/disable/{id}', 'App\Http\Controllers\OpdController@disable')->middleware('can:isAdmin');




