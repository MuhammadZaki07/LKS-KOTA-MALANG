<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DPRCandidate extends Model
{
    protected $fillable = [
        "party_id",
        "name",
        "province_id",
        "city_id",
    ];

    protected $table = "dpr_candidates";
}
