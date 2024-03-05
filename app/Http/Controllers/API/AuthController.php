<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => 'required',
            ],
            $request->all()
        );

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // return redirect()->route('home');
            $user = $request->user();
            $token = $user->createToken('auth_token');
            $user->token = $token->plainTextToken;

            return response()->json([
                'message'=>'Login successful',
                'data'=>$user
            ]);
        }   
        return response()->json([
            'message'=>'Login gagal',
        ],401);     
        // return redirect()
        //     // ->back()
        //     // ->withInput($request->only('email'))
        //     // ->withErrors([
        //     //     'email' => 'These credentials do not match our records.',
        //     // ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'Logout successful'
        ]);
    }
}
