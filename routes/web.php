<?php

use App\Http\Controllers\PlacesController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get("/places", [PlacesController::class, "index"]);

Route::view('/places/add', "showForm");
Route::post('/places/add', [PlacesController::class, "sendForm"]);

Route::get("/places/{id}", [PlacesController::class, "showPlaceInfo"]);

Route::get('/places/{id}/photos/add', [PlacesController::class, "addPlacePhotoForm"]);
Route::post('/places/{id}/photos/add', [PlacesController::class, "addPlacePhotoSubmit"]);

Route::get("/places/remove/{id}", [PlacesController::class, "remove"]);

