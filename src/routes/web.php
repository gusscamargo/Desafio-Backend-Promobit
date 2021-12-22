<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::post("/login", [AuthController::class, "authentication"])->name("authentication");
Route::get("/login", ErrorController::class);

Route::middleware(["auth"])->group(function () {

    Route::get("/home", HomeController::class)->name("home");

    // Auth
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");

    // Tags
    Route::get("/tag", [TagController::class, "show"])->name("tags");
    Route::get("/tag/{id}", [TagController::class, "registeredPage"])->where(['id' => "[0-9]+"]);
    Route::get("/tag/create", [TagController::class, "createPage"]);
    Route::get("/tag/edit", ErrorController::class);
    Route::get("/tag/delete", ErrorController::class);

    Route::post("/tag/create", [TagController::class, "register"]);
    Route::post("/tag/edit", [TagController::class, "update"]);
    Route::post("/tag/delete", [TagController::class, "delete"]);


    // Produtos
    Route::get("/product", [ProductController::class, "showProducts"])->name("products");
    Route::get("/product/{id}", ErrorController::class)->where(['id' => "[0-9]+"]);
    Route::get("/product/create", [ProductController::class, "createPage"]);

    Route::post("/product/create", [ProductController::class, "register"]);
    // Route::post("/product/edit", [ProductController::class, "update"]);
    Route::post("/product/delete", [ProductController::class, "delete"]);
});
