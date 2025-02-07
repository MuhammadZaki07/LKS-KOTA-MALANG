<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getUser(Request $request)
    {
        return $request->user();
    }

    public function register(Request $request)
    {
        $validation = $request->validate([
            "email" => "email|required|unique:users,email",
            "password" => "password|min:6|required|confirmed",
            "confirm_password" => "required"
        ]);

        if ($request->password !== $request->confirm_password) {
            return response()->json([
                "status" => "invalid",
                "message" => "password tidak sama"
            ], 400);
        }

        $user = User::create($validation);
        return response()->json([
            "status" => "success",
            "message" => "Regsiter Success",
            "data" => $user
        ], 201);
    }

    public function login(Request $request)
    {
        $validation = $request->validate([
            "email" => "required",
            "password" => "required|min:6",
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                "status" => "success",
                "message" => "Login Success",
                "data" => $user,
                "token" => $token
            ], 200);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user) {
            $user->currentAccessToken()->delete();
            return response()->json([
                "status" => "success",
                "message" => "Logout Success",
            ], 200);
        }
        return response()->json([
            "status" => "Error",
            "message" => "Token g ada",
        ], 401);
    }


    public function validateEmail(Request $request)
    {
        $request->validate([
            "email" => "email|required",
        ]);
        $check = User::where('email', $request->email)->first();
        if ($request->email !== $check) {
            return response()->json([
                "status" => "error",
                "message" => "emsil tidak sama",
            ],404);
        }
        return response()->json([
            "status" => "success",
            "message" => "emsil berhasil di validasi",
            "data" => $check
        ],200);
    }
}
