<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSchoolLevel extends Model
{
    use HasFactory;

    // https://stackoverflow.com/a/34463014/15694873
    protected $table = 'product_school_level';

    protected $fillable = [
        "product_id",
        "school_level_id"
    ];
}
