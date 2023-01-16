<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return !auth()->check();
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'username' => ['required', Rule::unique('users')],
      'email' => ['required', 'email', Rule::unique('users')],
      'password' => 'required',
      'nickname' => ['required', Rule::unique('users')],
    ];
  }
}
