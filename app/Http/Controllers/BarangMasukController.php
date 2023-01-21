<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangMasuk\{StoreRequest, UpdateRequest};
use App\Models\{Barang, BarangMasuk};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
  public function index()
  {
    $barangMasuks = BarangMasuk::latest()->paginate(10);

    return view('dashboard.barang_masuk.index', ['barangMasuks' => $barangMasuks]);
  }

  public function create()
  {
    $barangs = Barang::latest()->get();

    return view('dashboard.barang_masuk.create', ['barangs' => $barangs]);
  }

  public function store(StoreRequest $request)
  {
    $formFields = $request->validated();

    BarangMasuk::create($formFields); 

    return to_route('barang-masuk.index')->with('success', 'Data baru berhasil ditambahkan');
  }

  public function edit(BarangMasuk $barangMasuk)
  {
    $barangs = Barang::latest()->get();

    return view('dashboard.barang_masuk.edit', [
      'barangMasuk' => $barangMasuk,
      'barangs' => $barangs,
    ]);
  }

  public function update(UpdateRequest $request, BarangMasuk $barangMasuk)
  {
    $formFields = $request->validated();

    $barang = $barangMasuk->barang;

    try {
      DB::beginTransaction();

      // stok baru
      $newStok = ($barang->stok - $barangMasuk->jumlah) + intval($formFields['jumlah']);

      $barang->update(['stok' => $newStok]);

      $barangMasuk->update($formFields);

      DB::commit();

      session()->flash('success', 'Data berhasil diubah');
    } catch (\Exception) {
      DB::rollBack();

      session()->flash('failed', 'Data gagal diubah, silahkan coba lagi dan jika masalah berlanjut harap hubungi developer');
    }

    return to_route('barang-masuk.index');
  }

  public function destroy(BarangMasuk $barangMasuk)
  {
    if (BarangMasuk::destroy($barangMasuk->id)) {
      session()->flash('success', 'Data berhasil dihapus');
    } else {
      session()->flash('failed', 'Data gagal dihapus');
    }

    return to_route('barang-masuk.index');
  }
}
