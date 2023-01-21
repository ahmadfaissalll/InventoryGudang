<?php

namespace App\Http\Requests\Note;

use App\Models\Note;
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
    $note = $this->route('note');
    
    return $note && $this->user()->can('manipulate', $note);
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'konten' => 'required',
    ];
  }
}
