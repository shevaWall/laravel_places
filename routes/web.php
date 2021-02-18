<?php

use App\Http\Controllers\FormController;
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

Route::group([
    //'middleware'=>  '',
    'prefix'    =>  'places',
    'as'        =>  'places.',
], function(){
    Route::get("/", [PlacesController::class, "index"])
        ->name('showPlacesList');

    Route::view('add', "showForm")
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










/*Route::middleware('auth')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::name('admin.')->group(function(){

            Route::get("users", [Admin\UsersController::class, "index"])
                ->name('users');
            Route::get("posts", [Admin\PostsController::class, "index"])
                ->name('posts');

        });
    });
});*/
