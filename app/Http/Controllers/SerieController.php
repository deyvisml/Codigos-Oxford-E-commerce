<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index(Category $category)
    {
        // get a serie of the category and redirect  

        if ($category->series->count() > 0) {
            $serie = $category->series->toQuery()->orderBy('name', 'ASC')->first();
        } else {
            // si es que la categoria no tiene ninguna serie
            return redirect()->route("home.index");
        }

        return redirect()->route("series.show", ["category" => $category, "serie" => $serie]);
    }

    public function show(Category $category, Serie $serie)
    {
        // get series
        $series = $category->series->toQuery()->orderBy('name', 'ASC')->get();

        // get series levels
        $levels = $serie->levels;


        // get products for the current school
        $product_groups = array();

        $i = 0;
        foreach ($levels as $level) {
            $product_groups[$i] = array();

            $product_groups[$i]["level"] = $level;

            $product_groups[$i]["products"] = Product::where("products.level_id", $level->id)
                ->orderBy("products.name", "ASC")
                ->get();

            $i++;
        }

        //dd($product_groups);

        return view("series", ["current_category" => $category, "current_serie" => $serie, "series" => $series, "levels" => $levels, "product_groups" => $product_groups]);
    }
}
