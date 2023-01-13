<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\Barang\{StoreBarangRequest, UpdateBarangRequest};

class BarangController extends Controller
{
  public function index()
  {
    $barangs = Barang::latest()->paginate(10);

    return view('dashboard.barang.index', ['barangs' => $barangs]);
  }

  public function create()
  {
    return view('dashboard.barang.create');
  }

  public function store(StoreBarangRequest $request)
  {
    $formFields = $request->validated();

    Barang::create($formFields);

    return redirect()->route('barang.index')->with('success', 'Barang Berhasil Ditambahkan');
  }

  public function edit(Barang $barang)
  {
    return view('dashboard.barang.edit', ['barang' => $barang]);
  }

  public function update(UpdateBarangRequest $request, Barang $barang)
  {
    $formFields = $request->validated();
    
    $barang->update($formFields);

    return redirect()->route('barang.index')->with('success', 'Barang Berhasil Diubah');
  }

  public function destroy(Barang $barang)
  {
    if (Barang::destroy($barang->id)) {
      session()->flash('success', 'Barang berhasil dihapus');
    } else {
      session()->flash('failed', 'Barang Gagal dihapus');
    }

    return redirect()->route('barang.index');
  }
}
