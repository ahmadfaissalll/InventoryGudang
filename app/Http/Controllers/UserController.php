<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Support\Facades\{Hash, Auth};

class UserController extends Controller
{
  public function index()
  {
    return view('user.login');
  }

  public function create()
  {
    return view('user.register');
  }

  public function store(StoreRequest $request)
  {
    $formFields = $request->validated();

    $formFields['password'] = Hash::make($formFields['password']);

    $user = User::create($formFields);

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $remember_me = false;

    // kalo remember_me tidak null lakukan validasi
    if (!is_null($request->input('remember_me'))) {
      $request->validate([
        'remember_me' => 'accepted'
      ]);

      $remember_me = true;
    }

    $isLoginSuccess = Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $remember_me);

    if ($isLoginSuccess) {
      $request->session()->regenerate();

      return redirect(RouteServiceProvider::HOME);
    }



    return redirect('/login')->withErrors([
      'email' => 'Invalid Credential'
    ])->onlyInput('email');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
  }
}
