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











