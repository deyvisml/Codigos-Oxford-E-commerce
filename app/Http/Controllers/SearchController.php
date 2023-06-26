<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            "keyword" => "required|max:500"
        ]);

        // buscar los items para el keyword: https://stackoverflow.com/questions/28543166/laravel-filter-a-value-in-all-columns
        $query = Product::query();
        $columns = ['name', 'isbn', 'isbn2'];
        foreach ($columns as $column) {
            $query->orWhere($column, 'LIKE', '%' . $request->keyword . '%');
        }

        $products = $query->paginate(25);

        return view("search", ["products" => $products, "keyword" => $request->keyword]);
    }
}
