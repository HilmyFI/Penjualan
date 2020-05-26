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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/ambilgudang', 'GudangsController@ambil');
Route::get('/ambilbarang', 'BarangsController@ambil');
Route::post('/savebarang', 'PermintaansController@savebarang');

Route::resources([
    'customers' => 'CustomersController',
    'barangs' => 'BarangsController',
    'gudangs' => 'GudangsController',
    'sales' => 'SalesController',
    'akuns' => 'AkunsController',
    'pajaks' => 'PajaksController',
    'jurnals' => 'JurnalsController',
    'pemesanans' => 'PemesanansController',
    'pengirimans' => 'PengirimansController',
    'penawarans' => 'PenawaransController',
    'fakturs' => 'FaktursController',
    'returs' => 'RetursController',
    'piutangs' => 'PiutangsController',
    'pembayarans' => 'PembayaransController',
]);