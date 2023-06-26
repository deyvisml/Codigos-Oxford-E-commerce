<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Serie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // get series
        $series = Serie::inRandomOrder()->limit(20)->get();

        // get products from 5 diferent series
        $id_series_selected = [1, 4, 5, 8, 7];

        $group_products = array();

        for ($i = 0; $i < count($id_series_selected); $i++) {
            $group_products[$i] = array();

            $group_products[$i]["serie"] = Serie::find($id_series_selected[$i]);

            $group_products[$i]["products"] = Product::join("levels", "products.level_id", "=", "levels.id")
                ->join("series", "levels.serie_id", "=", "series.id")
                ->where("series.id", $id_series_selected[$i])
                ->select("products.*")
                ->get();
        }

        return view("home", ["series" => $series, "group_products" => $group_products]);
    }

    public function serie(Serie $serie)
    {
        $category = $serie->category;

        return redirect()->route("series.show", ["category" => $category, "serie" => $serie]);
    }
}
