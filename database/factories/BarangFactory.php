<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $sentence = fake()->sentence(5);

    return [
      'nama' => substr($sentence, 0, 50),
      'jenis' => collect(['Perkakas', 'Elektronik', 'Perabotan'])->random(),
      'merk' => collect(['Samsung', 'LG', 'Sharp', 'Aqua'])->random(),
      'ukuran' => mt_rand(1, 50) . " " . collect(['Kilogram', 'Centimeter', 'Meter'])->random(),
      'stok' => mt_rand(1, 100),
    ];
  }
}
