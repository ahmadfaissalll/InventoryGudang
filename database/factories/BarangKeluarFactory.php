<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangKeluar>
 */
class BarangKeluarFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $barang = Barang::find(mt_rand(1, Barang::count()));

    return [
      'nama_barang' => $barang->nama,
      'id_barang' => $barang->id,
      'jumlah' => mt_rand(1, $barang->stok),
      'penerima' => fake()->name,
    ];
  }
}
