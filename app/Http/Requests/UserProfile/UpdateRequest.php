<?php

namespace App\Http\Requests\UserProfile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
    $id = auth()->user()->id;

    $uniqueRule = Rule::unique('users')->ignore($id);

    return [
      'nickname' => ['required', $uniqueRule],
      'username' => ['required', $uniqueRule],
      'email' => ['required', 'email', $uniqueRule],
    ];
  }
}
