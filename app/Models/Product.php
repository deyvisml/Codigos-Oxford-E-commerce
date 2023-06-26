<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "product_component_list",
        "image",
        "isbn",
        "isbn2",
        "edition",
        "format",
        "licence_length",
        "price_usd",
        "price_usd",
        "level_id",
    ];

    // problem with route model bidding custom keys https://stackoverflow.com/a/61073459/15694873
    /*public function getRouteKeyName()
    {
        return 'isbn';
    }*/

    public function level()
    {
        return $this->belongsTo(Level::class)->select(["id", "name"]);
    }

    // https://stackoverflow.com/a/63803927/15694873 
    public function serie()
    {
        $level = Level::find($this->level->id);

        return $level->serie();
    }

    public function category()
    {
        $level = Level::find($this->level->id);
        $serie = Serie::find($level->serie_id);

        return $serie->category();
    }

    public function codes()
    {
        return $this->hasMany(Code::class);
    }
}
