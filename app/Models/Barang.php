<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  use HasFactory;

  protected $table = 'barang';

  protected $guarded = [
    'id',
    'created_at',
    'updated_at',
  ];

  public function scopeFilter($query, array $filters)
  {
    if ($filters['search'] ?? false) {
      $expression = ['like', '%' . request('search') . '%'];

      $query->where('nama', ...$expression)
        ->orWhere('jenis', ...$expression)
        ->orWhere('merk', ...$expression);
    }
  }
}
