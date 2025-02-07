<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DPDCandidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DPDCandiidatesController extends Controller
{
    public function index() {
        $DPD = DPDCandidate::all();
        return response()->json([
            "status" => "success",
            "message" => "success edit DPD",
            "data" => $DPD
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "province_id" => "required|exists:dpr_candidates,province_id",
            "photo" => "required|min:2050",
            "city_id" => "required|exists:dpr_candidates,city_id",
        ]);

        $path = $request->file('photo')->storePublicly('photo_dpd','public');
        $DPD = DPDCandidate::create([
            "name" =>  $request->name,
            "province_id" => $request->province_id,
            "photo" => $path,
            "city_id" =>  $request->city_id,
        ]);
        return response()->json([
            "status" => "success",
            "message" => "success edit DPR",
            "data" => $DPD
        ], 200);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string",
            "province_id" => "required|exists:dpr_candidates,province_id",
            "photo" => "required|min:2050",
            "city_id" => "required|exists:dpr_candidates,city_id",
        ]);

        $DPR = DPDCandidate::findOrFail($id);
        if($path = $request->file('photo')->storePublicly('photo_dpd','public')){
            Storage::disk('public')->delete($DPR->photo);
            $DPR->photo = $path;
        }

        $DPR->update([
            "party_id" => $request->party_id,
            "name" =>  $request->name,
            "province_id" => $request->province_id,
        ]);

        return response()->json([
            "status" => "success",
            "message" => "success edit DPR",
            "data" => $DPR
        ], 200);
    }

    public function delete($id)
    {
        $DPR = DPDCandidate::findOrFail($id);
        $DPR->delete();
        return response()->json([
            "status" => "success",
            "message" => "success delete DPD",
        ], 200);
    }
}
