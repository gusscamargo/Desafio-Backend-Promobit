<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;

// Rotas basicas
Route::get('/', IndexController::class)->name("login");
Route::post("/login", [AuthController::class, "authentication"]);

Route::middleware(["auth"])->group(function () {

    Route::get("/home", HomeController::class)->name("home")->middleware("auth");

    // Auth
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");

    // Tags
    Route::get("/tag", [TagController::class, "showTags"])->name("tags");


    // Produtos
    Route::get("/product", [ProductController::class, "showProducts"])->name("products");
});
