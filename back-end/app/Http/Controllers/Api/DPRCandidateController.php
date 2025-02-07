<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DPRCandidate;
use Illuminate\Http\Request;

class DPRCandidateController extends Controller
{
    public function index() {
        $DPR = DPRCandidate::all();
        return response()->json([
            "status" => "success",
            "message" => "success edit DPR",
            "data" => $DPR
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            "party_id" => "required|exists:dpr_candidates,party_id",
            "name" => "required|string",
            "province_id" => "required|exists:dpr_candidates,province_id",
            "city_id" => "required|exists:dpr_candidates,city_id"
        ]);
        $DPR = DPRCandidate::create([
            "party_id" => $request->party_id,
            "name" =>  $request->name,
            "province_id" => $request->province_id,
            "city_id" =>  $request->city_id
        ]);
        return response()->json([
            "status" => "success",
            "message" => "success edit DPR",
            "data" => $DPR
        ], 200);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            "party_id" => "required|exists:dpr_candidates,party_id",
            "name" => "required|string",
            "province_id" => "required|exists:dpr_candidates,province_id",
            "city_id" => "required|exists:dpr_candidates,city_id"
        ]);
        $DPR = DPRCandidate::findOrFail($id);
        $DPR->update([
            "party_id" => $request->party_id,
            "name" =>  $request->name,
            "province_id" => $request->province_id,
            "city_id" =>  $request->city_id
        ]);

        return response()->json([
            "status" => "success",
            "message" => "success edit DPR",
            "data" => $DPR
        ], 200);
    }

    public function delete($id)
    {
        $DPR = DPRCandidate::findOrFail($id);
        $DPR->delete();
        return response()->json([
            "status" => "success",
            "message" => "success delete DPR",
        ], 200);
    }
}
