<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ImagesController;
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

Route::get("/", [PlacesController::class, "index"])
    ->name('index');


/**
 * маршруты для взаимодействия с моделью Places
 */
Route::group([
    //'middleware'=>  '',
    'prefix'    =>  'places',
    'as'        =>  'places.',
], function(){
    Route::get("/", [PlacesController::class, "index"])
        ->name('showPlacesList');

    Route::view('add', "places.showForm")
        ->name('showForm');
    Route::post('add', [PlacesController::class, "sendForm"])
        ->name('SubmitForm');

    Route::get('{id}', [PlacesController::class, "showPlaceInfo"])
        ->name('showPlaceInfo');

    Route::get('{id}/photos/add', [PlacesController::class, "addPlacePhotoForm"])
        ->name('showFormAddPhoto');
    Route::post('{id}/photos/add', [PlacesController::class, "addPlacePhotoSubmit"])
        ->name('submitFormAddPhoto');


    Route::get("remove/{id}", [PlacesController::class, "remove"])
        ->name('removePlace');
});

/**
 * маршруты для взаимодействия с моделью Images
 */
Route::group([
//    'middleware'=>  '',
    'prefix'    =>  'photos',
    'as'        =>  'photos.',
], function(){
    Route::get("add", [ImagesController::class, 'index'])
        ->name('show_form');
    Route::post('add', [ImagesController::class, "submitForm"])
        ->name('submit_form');
});



Route::get("countries", [CountriesController::class, "index"]);

Route::get("comments", [CommentsController::class, "index"]);

Route::get("videos/{id}/comments", [CommentsController::class, "videoComments"]);
Route::get("video_comments/add", [CommentsController::class, "videoComment"]);
Route::get("photo_comments/add", [CommentsController::class, "photoComment"]);
