<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Home page
Route::get('/', [ListingController::class, 'index']);
//Shows Create Form
Route::get('/listing/create', [ListingController::class, 'create']);
//Stores the Data
Route::post('/listing', [ListingController::class, 'store']);
//Show Edit form
Route::get('/listing/{listing}/edit', [ListingController::class, 'edit']);
//Upadte Listing
Route::put('/listing/{listing}', [ListingController::class, 'update']);
//Delete Listing
Route::delete('/listing/{listing}', [ListingController::class, 'destroy']);
//Shows Single Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);
