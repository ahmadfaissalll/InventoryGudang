<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Barang, BarangKeluar};
use App\Http\Requests\BarangKeluar\{StoreRequest, UpdateRequest};
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
  public function index()
  {
    $barangKeluars = BarangKeluar::orderByDesc('created_at')->paginate(10);

    return view('dashboard.barang_keluar.index', ['barangKeluars' => $barangKeluars]);
  }

  public function create()
  {
    $barangs = Barang::orderByDesc('created_at')->get();

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

  public function update(UpdateRequest $request, BarangKeluar $barangKeluar)
  {
    $formFields = $request->validated();

    try {
      DB::beginTransaction();

      $barang = $barangKeluar->barang;

      // stok baru
      $newStok = ($barang->stok + $barangKeluar->jumlah) - intval($formFields['jumlah']);

      $barang->update(['stok' => $newStok]);

      $barangKeluar->update($formFields);

      DB::commit();

      session()->flash('success', 'Data berhasil diubah');
    } catch (\Exception) {
      DB::rollBack();

      session()->flash('failed', 'Data gagal diubah, silahkan coba lagi dan jika masalah berlanjut harap hubungi developer');
    }

    return to_route('barang-keluar.index');
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
