<?php

use App\Models\User;
use App\Models\Serie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SerieController;
use App\Models\Product;
use Laravel\Socialite\Facades\Socialite; // google auth

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, "index"])->name("home.index");

Route::get("/products/{product:id}", [ProductController::class, "index"])->name("products.index");

// problem with route model bidding custom keys https://stackoverflow.com/a/61073459/15694873
Route::get("/categoria/{category}/serie/{serie}/producto/{product}", [ProductController::class, "show"])->name("products.show");

// google auth
Route::get('/google-auth/redirect', [LoginController::class, "index"])->name("login");
Route::get('/google-auth/callback', [LoginController::class, "store"]);
Route::get("/google-auth/logout", [LogoutController::class, "store"])->name("logout");
// end google auth

Route::get("/search", [SearchController::class, "index"])->name("search.index");

Route::get("/pais/{country}/escuelas/", [SchoolController::class, "index"])->name("schools.index");
Route::get("/pais/{country}/escuelas/{school}", [SchoolController::class, "show"])->name("schools.show");

Route::get("/series/{serie}", [HomeController::class, "serie"])->name("home.serie");

Route::get("/categoria/{category}", [SerieController::class, "index"])->name("series.index");
Route::get("/categoria/{category}/serie/{serie}", [SerieController::class, "show"])->name("series.show");


Route::post("/proccess_purchase", [PurchaseController::class, "proccess_purchase"])->name("purchase.proccess");

Route::get("/compra_exitosa", [PurchaseController::class, "finish_purchase_succed"])->name("purchase.finish_succed");

Route::get("/compra_error", [PurchaseController::class, "finish_purchase_error"])->name("purchase.finish_error");

Route::get("/mis_compras", [PurchaseController::class, "purchases_list"])->name("purchase.list");
