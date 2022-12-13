<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function __(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'device_name' => ['required', 'string'],
        ]);
        $user = User::where('email', $request->input('email'))->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw validationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $token = $user->createToken($request->input('device_name'))->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' =>[
            'token' => $token,
            'user' => $user->toArray()
            ]
        ]);
    }
}
