<?php

namespace App\Http\Requests\BarangMasuk;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return auth()->check();
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'id_barang' => 'required|numeric',
      'jumlah' => 'required|numeric',
      'pengirim' => 'required',
      'keterangan' => 'required',
      'tanggal' => 'date_format:Y-m-d',
    ];
  }
}
