<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::where('role','registered');
        return response()->json([
            "status" => "success",
            "message" => "success get data user role resgisred",
            "data" => $user
         ],200);
    }

    public function show($userId){
        $user = User::findOrFail($userId);
        return response()->json([
            "status" => "success",
            "message" => "success get data user ID: " . $userId,
            "data" => $user
         ],200);
    }

    public function edit(Request $request , $userId){
        $request->validate([
            "name" => "required|string",
            "brith_date" => "required|date",
            "role" => "required"
        ]);

        $user = User::findOrFail($userId);
        $user->update([
            "name" => $request->name,
            "brith_date" => $request->brith_date,
            "role" => $request->role
        ]);

        return response()->json([
            "status" => "success",
            "message" => "success updated user",
            "data" => $user
         ],200);
    }

    public function delete($userId){
        $user = User::findOrFail($userId);
        $user->delete();
        return response()->json([
            "status" => "success",
            "message" => "success delete user",
            "data" => $user
         ],200);
    }

    public function ban($id){
        $user = User::findOrFail($id);
        $user->is_banned = true;
        return response()->json([
            "status" => "success",
            "message" => "success ban user",
            "data" => $user
         ],200);
    }
    public function unBan($id){
        $user = User::findOrFail($id);
        $user->is_banned = false;
        return response()->json([
            "status" => "success",
            "message" => "success ban user",
            "data" => $user
         ],200);
    }
}
