<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $fillable = [
        "name"
    ];

    protected $table = "provinces";
}
