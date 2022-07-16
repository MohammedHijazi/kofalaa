<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SponsorsController;
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


Route::get('/', [SponsorsController::class, 'index'])->name('home')->middleware('auth');

Route::resource('sponsors', 'SponsorsController')->middleware('auth');
Route::get('sponsors/{id}/profile', [SponsorsController::class,'profile'])->middleware('auth')->name('sponsors.profile');

Route::get('admin',[AdminController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('admin/countries',[AdminController::class,'viewCountries'])->middleware(['auth'])->name('countries.view');
Route::get('admin/governorates',[AdminController::class,'viewGovernorates'])->middleware(['auth'])->name('governorates.view');
Route::get('admin/cities',[AdminController::class,'viewCities'])->middleware(['auth'])->name('cities.view');
Route::get('admin/cities/create',[AdminController::class,'createCity'])->middleware(['auth'])->name('cities.create');
Route::post('admin/cities/store',[AdminController::class,'storeCity'])->middleware(['auth'])->name('cities.store');
Route::get('admin/cities/{id}/edit',[AdminController::class,'editCity'])->middleware(['auth'])->name('cities.edit');
Route::get('admin/streets',[AdminController::class,'viewStreets'])->middleware(['auth'])->name('streets.view');
Route::get('admin/streets/create',[AdminController::class,'createStreet'])->middleware(['auth'])->name('streets.create');
Route::post('admin/streets/store',[AdminController::class,'storeStreet'])->middleware(['auth'])->name('streets.store');



require __DIR__.'/auth.php';
