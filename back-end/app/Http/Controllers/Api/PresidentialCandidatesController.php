<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PresidentiaCandidates;
use Illuminate\Support\Facades\Storage;

class PresidentialCandidatesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "label" => "required|string",
            "president_name" => "required|string",
            "vice_president_name" => "required|string",
            "photo" => "mimes:png,jpg,jpeg|min:2050"
        ]);

        $path = $request->file('photo')->storePublicly('photo_presidents','public');

        $createData = PresidentiaCandidates::create([
            "label" => $request->label,
            "president_name" => $request->president_name,
            "vice_president_name" => $request->vice_president_name,
            "photo" => $path
        ]);

        return response()->json([
            "status" => "success",
            "message" => "success create data",
            "data" => $createData
        ],200);
    }

    public function edit(Request $request,$id){
        $request->validate([
            "label" => "required|string",
            "president_name" => "required|string",
            "vice_president_name" => "required|string",
            "photo" => "mimes:png,jpg,jpeg|min:2050"
        ]);

        $data = PresidentiaCandidates::findOrFail($id);

        if ($path = $request->file('photo')?->storePublicly('photo', 'public')) {
            Storage::disk('public')->delete($data->photo);
            $data->photo = $path;
        }

        $data->update([
            "label" => $request->label,
            "president_name" => $request->president_name,
            "vice_president_name" => $request->vice_president_name,
        ]);
        return response()->json([
            "status" => "success",
            "message" => "success updated data",
            "data" => $data
        ],200);
    }
}
