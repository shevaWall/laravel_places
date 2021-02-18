<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddImageForPlaceRequest;
use App\Models\Images;
use App\Models\Places;
use Illuminate\Http\Request;

class ImagesController extends PlacesController
{
    public function index(){
        $places = Places::placeIdAndNameOnly()->get();

        if(count($places) > 0){
            return view('photos.showFormAddPhoto')
                ->with('places', $places);
        }

        return redirect()->route('index');
    }

    /**
     * Загрузка изображений для какого-либо места
     * @param AddImageForPlaceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitForm(AddImageForPlaceRequest $request){
        if($request->file('image')){
            foreach ($request->file('image') as $img) {
                $filename = parent::uploadFile($img);

                Images::create(
                    [
                        'place_id' => $request->place,
                        'image' => $filename
                    ]
                );
            }
        }

        return redirect()->route('photos.show_form');
    }
}
