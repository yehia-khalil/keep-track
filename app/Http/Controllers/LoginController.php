<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\SuccessResource;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            Auth::user()->tokens()->delete();
            return SuccessResource::make([
                'token' => Auth::user()->createToken(Auth::user()->name)->plainTextToken,
                'user'  => Auth::user()
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials'], 401);

        }
    }

    public function logout(Request $request)
    {
        return $request->user()->tokens()->delete();
    }
}
