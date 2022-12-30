<?php

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

Route::get('/joueur', function () {
    return view('joeur');
});

Route::get('/stade', function () {
    return view('stade');
});
Route::get('stade/add', function () {
    return view('createStade');
});
Route::get('/reservations', function () {
    return view('Reservation');
});
Route::get('reservations/add', function () {
    return view('createReservation');
});

Route::get('/', function () {
    return view('auth');
});
Route::get('/autantqueadmin', function () {
    return view('registerAdmin');
});
Route::get('/autantquejoeur', function () {
    return view('registerJoueur');
});
Route::get('/sinscrire', function () {
    return view('auth');
});











