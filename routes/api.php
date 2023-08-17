<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "posts"], function () {
    Route::get("", [PostController::class, "list"]);
    Route::post("", [PostController::class, "store"]);
    Route::get("get-post", [PostController::class, "show"]);
    Route::post("delete", [PostController::class, "delete"]);
    Route::post("update", [PostController::class, "update"]);
});

Route::post("store", [PostController::class, "store"]);
