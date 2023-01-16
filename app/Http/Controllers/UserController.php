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
      'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
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
