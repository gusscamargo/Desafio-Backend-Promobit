<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', IndexController::class);

Route::get("/home", HomeController::class);

// Auth
Route::post("/auth", [AuthController::class, "authentication"]);
Route::get("/logout", [AuthController::class, "logout"]);

// Tags
Route::get("/tag", [TagController::class, "showTags"]);


// Produtos
Route::get("/product", [ProductController::class, "showProducts"]);