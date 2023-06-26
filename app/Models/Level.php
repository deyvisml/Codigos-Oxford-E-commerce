<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "category_id"
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class)->select(["id", "name"]);
    }
}
