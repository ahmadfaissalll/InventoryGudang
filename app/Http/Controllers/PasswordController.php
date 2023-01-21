<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Password\UpdateRequest;

class PasswordController extends Controller
{
  public function edit()
  {
    return view('dashboard.profile.editPassword');
  }

  public function update(UpdateRequest $request)
  {
    $formFields = $request->validated();

    $formFields['password'] = Hash::make($formFields['password']);
    
    auth()->user()->update($formFields);

    return to_route('profile.show')->with('success', 'Password berhasil diubah');
  }
}
