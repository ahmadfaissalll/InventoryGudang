<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangMasuk\{StoreRequest, UpdateRequest};
use App\Models\{Barang, BarangMasuk};
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
  public function index() {
    $barangMasuks = BarangMasuk::latest()->paginate(10);

    return view('dashboard.barang_masuk.index', ['barangMasuks' => $barangMasuks]);
  }

  public function create() {
    $barangs = Barang::latest()->get();

    return view('dashboard.barang_masuk.create', ['barangs' => $barangs]);
  }

  public function store(StoreRequest $request) {
    $formFields = $request->validated();

    BarangMasuk::create($formFields);
    return to_route('barang-masuk.index')->with('success', 'Data baru berhasil ditambahkan');
  }

  public function edit(BarangMasuk $barangMasuk) {
    $barangs = Barang::latest()->get();

    return view('dashboard.barang_masuk.edit', [
      'barangMasuk' => $barangMasuk,
      'barangs' => $barangs,
    ]);
  }

  public function update(UpdateRequest $request, BarangMasuk $barangMasuk) {
    $formFields = $request->validated();

    $barangMasuk->update($formFields);

    return to_route('barang-masuk.index')->with('success', 'Data berhasil diubah');
  }

  public function destroy(BarangMasuk $barangMasuk) {
    BarangMasuk::destroy($barangMasuk->id);

    return to_route('barang-masuk.index')->with('success', 'Data berhasil dihapus');
  }
}
