<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeneficiariesController;
use App\Http\Controllers\FamilyMembersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SponsorsController;
use App\Http\Controllers\StatusController;
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


Route::get('/', [AdminController::class,'home'])->name('home')->middleware('auth');

//Sponsors routes
Route::resource('sponsors', 'SponsorsController')->middleware('auth');
Route::get('sponsors/{id}/profile', [SponsorsController::class,'profile'])->middleware('auth')->name('sponsors.profile');
Route::get('sponsors/{id}/beneficiaries', [SponsorsController::class,'beneficiariesIndex'])->middleware('auth')->name('sponsors.beneficiaries');


//Beneficiaries routes
Route::resource('beneficiaries', 'BeneficiariesController')->middleware('auth');
Route::post('beneficiaries/{id}/add_family_member', [FamilyMembersController::class,'store'])->middleware('auth')->name('beneficiaries.add_family_member');
Route::get('beneficiaries/family_members/{id}/show', [FamilyMembersController::class,'show'])->middleware('auth')->name('beneficiaries.family_members.show');
Route::get('beneficiaries/family_members/{id}', [FamilyMembersController::class,'edit'])->middleware('auth')->name('beneficiaries.family_members.edit');
Route::post('beneficiaries/family_members/{id}', [FamilyMembersController::class,'update'])->middleware('auth')->name('beneficiaries.family_members.update');
Route::get('beneficiaries/family_members/{id}/destroy', [FamilyMembersController::class,'destroy'])->middleware('auth')->name('beneficiaries.family_members.destroy');

Route::resource('parents', 'BirthParentsController')->middleware('auth');

Route::resource('guardians', 'GuardiansController')->middleware('auth');

Route::post('beneficiaries/status',[StatusController::class,'storeEconomical'])->middleware('auth')->name('beneficiaries.economical.status.store');
Route::post('beneficiaries/housing',[StatusController::class,'storeHousing'])->middleware('auth')->name('beneficiaries.housing.store');
Route::get('beneficiaries/housing/{id}',[StatusController::class,'editHousing'])->middleware('auth')->name('beneficiaries.editHousing');
Route::put('beneficiaries/housing/{id}',[StatusController::class,'updateHousing'])->middleware('auth')->name('beneficiaries.updateHousing');
Route::get('beneficiaries/economical/{id}',[StatusController::class,'editEconomical'])->middleware('auth')->name('beneficiaries.editEconomical');
Route::put('beneficiaries/economical/{id}',[StatusController::class,'updateEconomical'])->middleware('auth')->name('beneficiaries.updateEconomical');


//searching routes
Route::get('search', [SearchController::class,'index'])->middleware('auth')->name('search.index');
Route::get('search/results', [SearchController::class,'search'])->middleware('auth')->name('search.results');
Route::get('search/beneficiaries', [SearchController::class,'searchBeneficiariesIndex'])->middleware('auth')->name('search.beneficiaries');
Route::get('search/beneficiaries/results', [SearchController::class,'searchBeneficiaries'])->middleware('auth')->name('search.beneficiaries.results');



//payment routes



//Admin panel routes
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


//payments routes
Route::get('payments',[PaymentsController::class,'index'])->middleware(['auth'])->name('payments.index');
Route::get('payments/create',[PaymentsController::class,'create'])->middleware(['auth'])->name('payments.create');
Route::post('payments/store',[PaymentsController::class,'store'])->middleware(['auth'])->name('payments.store');
Route::delete('payments/{id}',[PaymentsController::class,'destroy'])->middleware(['auth'])->name('payments.destroy');
Route::get('payments/{id}/edit',[PaymentsController::class,'edit'])->middleware(['auth'])->name('payments.edit');
Route::put('payments/{id}',[PaymentsController::class,'update'])->middleware(['auth'])->name('payments.update');
//Rote for deleting beneficiary from a payment
Route::get('payments/{payment_id}/delete',[PaymentsController::class,'destroyBeneficiaryPayment'])->name('ben.payment.destroy');

//Route for testing purposes
Route::get('test', function () {
    dd(\App\Models\Payment::find(5)->total_amount);
});


require __DIR__.'/auth.php';
