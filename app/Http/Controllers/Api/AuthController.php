<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    /**
     *  Register new user & login
     * @param object $request
     * Returns user object
     */
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
          ]);
    
          $token = auth()->login($user);
    
          return $this->respondWithToken($token);
    }
    /**
     *  login to api 
     * @param object $request
     * return with token
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email','password']);

        if(!$token = auth()->attempt($credentials)){
            return response()->json(['error' => 'Unauthorized'],401);
        }
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth()->factory()->getTTL() * 60
      ]);
    }

    /**
     * Retrieve all users
     */
    public function index()
    {
      return response()->json([User::all()],200);
    }
}
