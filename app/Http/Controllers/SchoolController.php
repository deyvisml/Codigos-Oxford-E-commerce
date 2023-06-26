<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\ProductSchoolLevel;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Country $country)
    {
        // get an school of the country and redirect
        $school = array();
        if ($country->schools->count() > 0) {
            $school = $country->schools->toQuery()->orderBy('name', 'ASC')->first();
        } else {
            return redirect()->route("home.index");
        }

        //dd($school);

        return redirect()->route("schools.show", ["country" => $country, "school" => $school]);
    }

    public function show(Country $country, School $school)
    {
        // get schools
        $schools = array();

        if ($country->schools->count() > 0) {
            $schools = $country->schools->toQuery()->orderBy('name', 'ASC')->get();
        }

        // get school levels
        $school_levels = $school->school_levels;

        // get products for the current school
        $product_groups = array();

        $i = 0;
        foreach ($school_levels as $school_level) {

            $product_groups[$i] = array();

            $product_groups[$i]["school_level"] = $school_level;

            $product_groups[$i]["products"] = ProductSchoolLevel::join("products", "product_school_level.product_id", "=", "products.id")
                ->where("product_school_level.school_level_id", $school_level->id)
                ->orderBy("products.name", "ASC")
                ->select("products.*") // muy importante
                ->get();

            $i++;
        }

        //dd($product_groups);

        return view("schools", ["country" => $country, "current_school" => $school, "schools" => $schools, "school_levels" => $school_levels, "product_groups" => $product_groups]);
    }
}
