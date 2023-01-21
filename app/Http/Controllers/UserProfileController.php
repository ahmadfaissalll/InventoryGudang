<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserProfile\UpdateRequest;

class UserProfileController extends Controller
{
  public function show()
  {
    return view('dashboard.profile.index');
  }

  public function edit()
  {
    $user = auth()->user();

    return view('dashboard.profile.editProfile', ['user' => $user]);
  }

  public function update(UpdateRequest $request)
  {
    $formFields = $request->validated();

    auth()->user()->update($formFields);

    return to_route('profile.show')->with('success', 'Profile berhasil diubah');
  }
}
