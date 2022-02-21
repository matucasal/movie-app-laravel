<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Auth; 
use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function __invoke(Request $request)
  {
      $request->validate([
          'email' => ['required'],
          'password' => ['required']
      ]);

      if (Auth::attempt($request->only('email', 'password'))) {
          return response()->json(Auth::user(), 200);
      }

      /* throw ValidationException::withMessages([
          'email' => ['The provided credentials are incorrect.']
      ]); */
  }

    
}
