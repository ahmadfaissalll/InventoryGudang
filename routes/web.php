<?php

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{NoteController, BarangController, BarangKeluarController};

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
  return view('dashboard.home');
});

Route::resource('notes', NoteController::class)->only(['index', 'store', 'destroy']);

Route::resources([
  'barang' => BarangController::class,
  'barang-keluar' => BarangKeluarController::class,
]);

// GET SINGLE DATA BARANG
Route::get('/getBarang/{barang}', function(Request $request, Barang $barang) {
  return $barang;
});