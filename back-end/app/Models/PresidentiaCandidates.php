<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresidentiaCandidates extends Model
{
    protected $table = "presidential_candidates";
    protected $fillable = [
        "label",
        "president_name",
        "vice_president_name",
        "photo"
    ];
}
