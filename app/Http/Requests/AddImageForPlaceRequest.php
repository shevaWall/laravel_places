<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddImageForPlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'place' => 'required|not_in:0',
            'image.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ];
    }

    public function messages(){
        return [
            'place.required'=>  'Ваше место должно быть выбрано',
            'place.not_in'  =>  'Вы должны выбрать место!',

            'image.required'=>  'Обязательно заполните поле для загрузки изображения',
            'image.image'   =>  'Убедитесь, что вы пытаетесь загрузить правильный формат изображения',
            'image.mimes'   =>  'Вы можете загрузить один из этих форматов изображений ( jpg,png,bmp )',
        ];
    }
}
