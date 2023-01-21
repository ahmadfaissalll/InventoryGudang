<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\Barang\{StoreRequest, UpdateRequest};

class BarangController extends Controller
{
  public function index()
  {
    $barangs = Barang::orderByDesc('created_at')->filter(request(['search']))->paginate(10);

    return view('dashboard.barang.index', ['barangs' => $barangs]);
  }

  public function create()
  {
    return view('dashboard.barang.create');
  }

  public function store(StoreRequest $request)
  {
    $formFields = $request->validated();

    Barang::create($formFields);

    return to_route('barang.index')->with('success', 'Data baru berhasil ditambahkan');
  }

  public function edit(Barang $barang)
  {
    return view('dashboard.barang.edit', ['barang' => $barang]);
  }

  public function update(UpdateRequest $request, Barang $barang)
  {
    $formFields = $request->validated();
    
    $barang->update($formFields);

    return to_route('barang.index')->with('success', 'Data berhasil diubah');
  }

  public function destroy(Barang $barang)
  {
    if (Barang::destroy($barang->id)) {
      session()->flash('success', 'Data berhasil dihapus');
    } else {
      session()->flash('failed', 'Data gagal dihapus');
    }

    return to_route('barang.index');
  }
  
}
