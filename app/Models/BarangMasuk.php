<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
  use HasFactory;

  protected $table = 'barang_masuk';
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