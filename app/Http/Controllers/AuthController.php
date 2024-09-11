<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name'=>['required','string'],
            'email'=>['required', 'email', 'unique:users'],
            'password'=>['required', 'min:6'],
        ]);

        $user = User::create($data);

        $token = $user->createToken('auth_token')->plainTextToken;

        return ['user' => $user , 'token' => $token];
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Use Auth facade to login the user
        Auth::login($user);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token]);
    }


    public function logout(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $user->currentAccessToken()->delete();
            return response()->json(['message' => 'Logged out successfully']);
        }
        return response()->json(['message' => 'User not authenticated'], 401);
    }
}
