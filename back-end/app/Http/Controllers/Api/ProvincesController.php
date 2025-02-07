<?php

namespace App\Http\Controllers\Api;

use App\Models\Provinces;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class ProvincesController extends Controller
{
    public function index(){
        $provinces = Provinces::all();
        return response()->json([
            "status" => "success",
            "message" => "succes get all data provinces",
            "data" => $provinces
        ],200);
    }

    public function store(Request $request){
        $request->validate([
            "name" => "required|string"
        ]);
        $provinces = Provinces::create($request->all());
        return response()->json([
            "status" => "success",
            "message" => "succes create data provinces",
            "data" => $provinces
        ],200);
    }

    public function edit(Request $request,$id){
        $request->validate([
            "name" => "required|string"
        ]);
        $provinces = Provinces::findOrFail($id);
        $provinces->update($request->all());
        return response()->json([
            "status" => "success",
            "message" => "succes udpated data provinces",
            "data" => $provinces
        ],200);
    }

    public function delete($id){
        $provinces = Provinces::findOrFail($id);
        $provinces->delete();
        return response()->json([
            "status" => "success",
            "message" => "succes deleted data provinces",
            "data" => $provinces
        ],200);
    }
}
