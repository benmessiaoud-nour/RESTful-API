<?php

namespace App\Http\Controllers;


use App\Events\UserLogedIn;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
  public function login(Request $request)
  {
      if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
      {

          $user=Auth::user();
          event(new UserLogedIn($user));
          $accessToken=$user->createToken('access Token')->plainTextToken;
          return response()->json([
           'user'=>new UserResource($user),
              'accessToken'=>$accessToken
          ]);
      }
      return response()->json([
          'message'=>'the mail or password is not correct'
  ],401);

  }
}
