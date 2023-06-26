<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Level;
use App\Models\Product;
use App\Models\Serie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        $level = $product->level;
        $serie = $product->serie;
        $category = $product->category;

        return redirect()->route("products.show", ["category" => $category, "serie" => $serie, "product" => $product]);
    }

    public function show(Category $category, Serie $serie, Product $product)
    {
        $similar_products = $serie->products->toQuery()->inRandomOrder()->get();

        $level = $product->level;

        return view("product", ["category" => $category, "serie" => $serie, "level" => $level, "product" => $product, "similar_products" => $similar_products]);
    }
}
