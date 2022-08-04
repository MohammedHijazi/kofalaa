<?php

use App\Http\Controllers\Api\SponsorsController;
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
