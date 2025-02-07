<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $city = City::all();
        return response()->json([
            "status" => "success",
            "message" => "Get city Success",
            "data" => $city
        ], 201);
    }
    public function store(Request $request, $provicyId)
    {
        $request->validate([
            "privince_id" => "exists:cities,privince_id",
            "name" => "required|string"
        ]);

        $city = City::create([
            "privince_id" => $provicyId,
            "name" => $request->name
        ]);
        return response()->json([
            "status" => "success",
            "message" => "Create city Success",
            "data" => $city
        ], 201);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            "privince_id" => "required",
            "name" => "required|string"
        ]);
        $city = City::findOrFail($id);
        $city->update($request->all());
        return response()->json([
            "status" => "success",
            "message" => "succes udpated data city",
            "data" => $city
        ], 200);
    }

    public function delete($id){
        $City = City::findOrFail($id);
        $City->delete();
        return response()->json([
            "status" => "success",
            "message" => "succes deleted data City",
            "data" => $City
        ],200);
    }
}
