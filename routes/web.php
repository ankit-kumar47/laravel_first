<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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
Route::get('/', [ListingController::class, 'index'])->name('home');
//Shows Create Form
Route::get('/listing/create', [ListingController::class, 'create'])->middleware('auth');
//Stores the Data
Route::post('/listing', [ListingController::class, 'store'])->middleware('auth');
//Manage Listing
Route::get('/listing/manage', [ListingController::class, 'manage'])->middleware('auth');
//Show Edit form
Route::get('/listing/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
//Upadte Listing
Route::put('/listing/{listing}', [ListingController::class, 'update'])->middleware('auth');
//Delete Listing
Route::delete('/listing/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
//Shows Single Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);

//User Route

//Show Register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
//Show Login Form
Route::get('/signin', [UserController::class, 'signin'])->name('login')->middleware('guest');
//Create User
Route::post('/users', [UserController::class, 'store']);
//Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
//Login User
Route::post('/login', [UserController::class, 'login']);
//Show User Data
Route::get('/users/profile', [UserController::class, 'show'])->middleware('auth');
Route::put('/users/change_password', [UserController::class, 'update_password'])->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::get('/users/{user}/edit/password', [UserController::class, 'change_password'])->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');
