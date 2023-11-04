<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConfrencesController;
use App\Http\Controllers\ParticipantController;

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
Route::resource('dashboard', DashboardController::class)->middleware('can:isAdminOperator');
Route::get('/user/json', [\App\Http\Controllers\UserController::class, 'json'])->name('user.json');
Route::resource('catalog', CatalogController::class)->only('index');


Route::resource('user', UserController::class)->middleware('can:isAdmin');
Route::get('/user/destroy/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy')->middleware('can:isAdmin');
Route::get('/user/reset-pass/{id}', 'App\Http\Controllers\UserController@reset_pass')->name('user.reset-pass')->middleware('can:isAdmin');

Route::get('/profil', 'App\Http\Controllers\ProfilController@index')->name('profil.index')->middleware('can:isAdminOperator');
Route::put('/profil/change-password', 'App\Http\Controllers\ProfilController@change_password')->name('profil.change-password')->middleware('can:isAdminOperator');

Route::resource('opd', OpdController::class)->middleware('can:isAdmin');
Route::get('/opd/disable/{id}', 'App\Http\Controllers\OpdController@disable')->middleware('can:isAdmin');

Route::resource('location', LocationController::class)->middleware('can:isOperator');
Route::get('/location/disable/{id}', 'App\Http\Controllers\LocationController@disable')->middleware('can:isAdminOperator');
Route::get('/get-all-location', 'App\Http\Controllers\LocationController@all_location')->name('location.get-all')->middleware('can:isAdmin');

Route::resource('confrence', ConfrencesController::class)->middleware('can:isAdminOperator');
Route::get('/confrence/disable/{id}', 'App\Http\Controllers\ConfrencesController@disable')->middleware('can:isAdminOperator');
Route::get('/confrence/disable-participant/{id}', 'App\Http\Controllers\ConfrencesController@disable_participant')->middleware('can:isAdminOperator');
Route::get('/generatepdf-participant/{id}', 'App\Http\Controllers\ConfrencesController@generate_pdf')->name('confrence.generatepdf');
Route::get('/generatepdf-qrcode/{id}', 'App\Http\Controllers\ConfrencesController@generate_pdf_qrcode')->name('confrence.generatepdf-qrcode');
Route::get('/get-all-confrence', 'App\Http\Controllers\ConfrencesController@all_confrence')->name('confrence.get-all')->middleware('can:isAdmin');
Route::get('/generate_all_confrence_pdf', 'App\Http\Controllers\ConfrencesController@generate_all_confrence_pdf')->name('confrence.generatepdf-all-confrence')->middleware('can:isAdmin');

Route::get('/presence/{id}', 'App\Http\Controllers\ParticipantController@presence')->name('presence.confrence');
Route::post('participant/store', 'App\Http\Controllers\ParticipantController@store')->name('participant.store');



