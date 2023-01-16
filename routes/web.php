<?php

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{NotesController, BarangController, BarangMasukController, BarangKeluarController, UserController};

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


Route::middleware('auth')->group(function () {

  Route::redirect('/', '/dashboard');

  Route::get('/dashboard', function () {
    return view('dashboard.home');
  });

  Route::resource('notes', NotesController::class)->only(['index', 'store', 'destroy']);

  Route::resources([
    'barang' => BarangController::class,
    'barang-masuk' => BarangMasukController::class,
    'barang-keluar' => BarangKeluarController::class,
  ]);
});

Route::controller(UserController::class)->group(function () {
  Route::middleware('guest')->group(function () {
    // Register FORM
    Route::get('/register', 'create');

    Route::post('/register', 'store');

    // LOGIN FORM
    Route::get('/login', 'index')->name('login');

    // VALIDATE LOGIn
    Route::post('/login', 'authenticate');
  });

  Route::post('/logout', 'logout')->middleware('auth');
});

