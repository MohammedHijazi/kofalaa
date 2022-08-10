<?php

use App\Http\Controllers\Api\SponsorsController;
use App\Http\Controllers\PaymentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route fot getting all governorates and their corresponding cities and streets to be used in dropdown lists
Route::get('/data',[SponsorsController::class,'index'])->name('data');

//Route for getting family members' names for autocomplete when searching
Route::get('autocomplete/name', [SponsorsController::class,'fetch'])->name('autocomplete.name');

//
//Route for getting family members' names for autocomplete when searching
Route::get('search/{id}/beneficiaries', [PaymentsController::class,'fetchBeneficiaries'])->name('fetch.beneficiaries');


//Route for adding a beneficiary to a sponsor
Route::post('add_beneficiary',[SponsorsController::class,'addBeneficiary'])->name('add.beneficiary');

//Route for fetching all beneficiaries of a sponsor
Route::get('sponsor/{id}/beneficiaries',[SponsorsController::class,'fetchBeneficiaries'])->name('sponsor.beneficiaries');

//Route for deleting a beneficiary from a sponsor
Route::get('sponsor/{sponsor_id}/beneficiary/{beneficiary_id}',[SponsorsController::class,'destroyBeneficiary'])->name('destroy.beneficiary');

//Route for updating a beneficiary's sponsorship type
Route::get('update/sponsor/{sponsor_id}/beneficiary/{beneficiary_id}',[SponsorsController::class,'updateBeneficiary'])->name('update.beneficiary');


