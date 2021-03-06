<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Models\Images;
use App\Models\Places;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;

class PlacesController extends Controller
{

    /**
     * отображение список мест
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('places.showPlaces')
            ->with('places', Places::all());
    }

    /**
     * добавление нового места
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function sendForm(PlaceRequest $request)
    {
        $newPlace = Places::create([
            'name'          => $request->name,
            'places_type'   =>  $request->places_type
        ]);


        if ($request->file('image')) {
            foreach ($request->file('image') as $img) {
                $filename = $this->uploadFile($img);

                Images::create(
                    [
                        'place_id' => $newPlace->id,
                        'image' => $filename
                    ]
                );
            }
        }


        if ($request->action == 'stay')
            return view('places.showForm');

        if ($request->action == 'return')
            return redirect()->route('index');
    }

    /**
     * загружает изображение из временного хранилища в паблик
     * @param $file
     * @return false|string
     */
    public function uploadFile($file)
    {
        return Storage::putFile('images', $file);
    }

    /**
     * отображает подробную информацию о месте
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showPlaceInfo($id)
    {
        $place = Places::findOrFail($id)->with('image')->where('places.id', $id)->get();

        return view('places.showPlace')
            ->with('place', $place[0]);
    }

    /**
     * удаляет запись о посещении
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function remove($id)
    {
        Places::find($id)->delete();
        return redirect()->route('index');
    }

    /**
     * отображает форму для загрузки дополнительных изображений
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addPlacePhotoForm($id){
        $place = Places::findOrFail($id)->with('image')->where('places.id', $id)->get();

        return view('places.addPhotoPlace')
            ->with('place', $place[0]);
    }


    /**
     * добавляет дополнительные изображения
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addPlacePhotoSubmit(Request $request){
        if($request->file('image')){
            foreach ($request->file('image') as $img) {
                $filename = $this->uploadFile($img);

                Images::create(
                    [
                        'place_id' => $request->place_id,
                        'image' => $filename
                    ]
                );
            }
        }

        return redirect()->route('places.showFormAddPhoto', $request->place_id);
    }
}
