<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
  use HasFactory;

  protected $table = 'barang_keluar';
  protected $with = 'barang';

  protected $guarded = [
    'id',
    'created_at',
    'updated_at',
  ];

  public function barang() {
    return $this->belongsTo(Barang::class, 'id_barang');
  }
}
