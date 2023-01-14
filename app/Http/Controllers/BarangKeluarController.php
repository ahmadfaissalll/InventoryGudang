<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Barang, BarangKeluar};
use App\Http\Requests\BarangKeluar\{StoreRequest, UpdateRequest};

class BarangKeluarController extends Controller
{
  public function index()
  {
    $barangKeluars = BarangKeluar::latest()->paginate(10);

    return view('dashboard.barang_keluar.index', ['barangKeluars' => $barangKeluars]);
  }

  public function create()
  {
    $barangs = Barang::latest()->get();

    return view('dashboard.barang_keluar.create', ['barangs' => $barangs]);
  }

  public function store(StoreRequest $request)
  {
    $formFields = $request->validated();

    BarangKeluar::create($formFields);

    return to_route('barang-keluar.index')->with('success', 'Data baru berhasil ditambahkan');
  }

  public function edit(BarangKeluar $barangKeluar)
  {
    $barangs = Barang::latest()->get();

    return view('dashboard.barang_keluar.edit', [
      'barangKeluar' => $barangKeluar,
      'barangs' => $barangs
    ]);
  }

  public function update(UpdateRequest $request, BarangKeluar $barangKeluar) {
    $formFields = $request->validated();

    $barangKeluar->update($formFields);

    return to_route('barang-keluar.index')->with('success', 'Data berhasil diubah');
  }

  public function destroy(BarangKeluar $barangKeluar)
  {
    if (BarangKeluar::destroy($barangKeluar->id)) {
      session()->flash('success', 'Data berhasil dihapus');
    } else {
      session()->flash('failed', 'Data gagal dihapus');
    }

    return to_route('barang-keluar.index');
  }
}
