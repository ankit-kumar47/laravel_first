<?php

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

Route::get('/', function () {
  return view('listing', [
    'listings' => Listing::all(),
  ]);
});
Route::get('/register', function () {
  return view('register');
});
Route::get('/login', function () {
  return view('login');
});
Route::get('/post_job', function () {
  return view('post_job');
});
Route::get('/manage', function () {
  return view('manage', [
    'listings' => Listing::all(),
  ]);
});
Route::get('/listing/{listing}', function (Listing $listing) {
  return view('listing_single', [
    'listing' => $listing
  ]);
});
Route::get('/edit/{listing}', function (Listing $listing) {
  return view('edit', [
    'listing' => $listing
  ]);
});
