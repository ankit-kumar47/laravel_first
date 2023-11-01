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
Route::get('/listing/{id}', function ($id) {
  return view('listing_single', [
    'listing' => Listing::find($id)
  ]);
});
Route::get('/edit/{id}', function ($id) {
  return view('edit', [
    'listing' => Listing::find($id)
  ]);
});
