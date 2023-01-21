<?php

namespace App\Http\Requests\Password;

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
      'current_password' => 'required|current_password',
      'password' => 'required|confirmed',
      'password_confirmation' => 'required'
    ];
  }

  public function messages()
  {
    return [
      'current_password.required' => 'Password saat ini harus diisi',
      'current_password.current_password' => 'Password saat ini salah',
      'password.confirmed' => 'Konfirmasi password harus sama',
      'password_confirmation.required' => 'Konfirmasi Password harus diisi',
    ];
  }
}
