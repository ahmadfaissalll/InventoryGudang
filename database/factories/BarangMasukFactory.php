<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangMasuk>
 */
class BarangMasukFactory extends Factory
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
      'id_barang' => $barang->id,
      'jumlah' => mt_rand(1, $barang->stok),
      'pengirim' => fake()->name,
      'keterangan' => fake()->sentence,
      'tanggal' => fake()->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
    ];
  }
}
