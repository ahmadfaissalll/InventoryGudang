<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
  public function index() {
    $barangKeluars = BarangKeluar::latest()->paginate(10);

    return view('dashboard.barang_keluar.index', ['barangKeluars' => $barangKeluars]);
  }
}
