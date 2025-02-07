<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DPDCandidate extends Model
{
    protected $fillable = [
        "name",
        "photo",
        "province_id",
        "city_id",
    ];

    protected $table = "dpd_candidates";
}
