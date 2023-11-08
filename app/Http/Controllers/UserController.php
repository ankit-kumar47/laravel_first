<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
  //Show Register form
  public function create()
  {
    return view("users.register");
  }
  public function store(Request $request)
  {
    $formFields = $request->validate([
      "name" => ["required", "string", "min:3"],
      "email" => ["required", "string", "email", Rule::unique("users", 'email')],
      "password" => ["required", "string", 'confirmed', 'min:6'],
    ]);
    $formFields['password'] = bcrypt($formFields['password']);
    $user = User::create($formFields);
    auth()->login($user);
    return redirect()->route('home')->with('message', 'User Created and loggedIn');
  }

  //User Log Out
  public function logout(Request $request)
  {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home')->with('message', 'User Logged Out');
  }

  //User Log In
  public function login(Request $request)
  {
    $formFields = $request->validate([
      "email" => ["required", "string", "email"],
      "password" => ["required", "string", 'min:6'],
    ]);
    if (auth()->attempt($formFields)) {
      $request->session()->regenerate();
      return redirect()->route('home')->with('message', 'User Logged In Successfully');
    }
    return back()->withErrors(['email' => 'Invalid Credential'])->onlyInput('email');
  }
  public function signin()
  {
    return view('users.login');
  }

  //User Profile
  public function show()
  {
    return view('users.profile');
  }

  public function edit(User $user)
  {
    return view('users.edit', ['user' => $user]);
  }
  public function update(Request $request, User $user)
  {
    $formFields = $request->validate([
      "name" => ["required", "string", "min:3"],
      "email" => ["required", "string", "email"],
    ]);
    $user->update($formFields);
    return redirect('/users/profile')->with('message', 'Profile Updated Successfully');
  }
  public function change_password()
  {
    return view('users.change_password');
  }

  public function update_password(Request $request)
  {
    $formField = $request->validate([
      "password" => ["required", "string", 'confirmed', 'min:6']
    ]);
    $formField['password'] = bcrypt($formField['password']);
    auth()->user()->update($formField);
    return redirect('/users/profile')->with('message', 'Password Updated Successfully');
  }
}
