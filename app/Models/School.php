<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "country_id"
    ];

    public function school_levels()
    {
        return $this->hasMany(SchoolLevel::class);
    }
}
