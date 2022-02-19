<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\ExtraActions\ClientPdf;

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

Route::group(['middleware' => ['alert','auth']], function() {

  Route::get('/clients/pdf', [App\Http\Controllers\ExtraActions\ClientPdf::class, '__invoke'] );
  Route::resource('clients', 'App\Http\Controllers\ClientController');
  Route::resource('projects', 'App\Http\Controllers\ProjectController');

  Route::get('add/{id}', [App\Http\Controllers\ToDoController::class, 'store']);
  Route::get('delete/{id}', [App\Http\Controllers\ToDoController::class, 'destroy'])->middleware('check');

});

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');