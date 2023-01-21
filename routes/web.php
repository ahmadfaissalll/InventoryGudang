<?php

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{NotesController, BarangController, BarangMasukController, BarangKeluarController, PasswordController, UserController, UserProfileController};
use App\Models\Note;

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
    $jumlahBarang = Barang::count();

    return view('dashboard.home', ['jumlahBarang' => $jumlahBarang]);
  });

  Route::resource('dashboard/notes', NotesController::class)->except(['edit']);

  // get single notes for edit modal
  Route::get('/notes/{id}', function(int $id) {
    $note = Note::without('user')->findOrFail($id, ['id', 'konten']);

    return $note;
  })->where('id', '[0-9]+');

  Route::resources([
    'dashboard/barang' => BarangController::class,
    'dashboard/barang-masuk' => BarangMasukController::class,
    'dashboard/barang-keluar' => BarangKeluarController::class,
  ]);

  Route::singleton('dashboard/profile', UserProfileController::class);
  Route::singleton('dashboard/profile/edit-password', PasswordController::class)->except('show');
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