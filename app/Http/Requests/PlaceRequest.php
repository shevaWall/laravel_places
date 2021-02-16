<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
            'name'          =>  'required|unique:places|max:255|alpha',
            'places_type'   =>  'required',
            'image'         =>  'image|mimes:jpg,png,bmp',
        ];
    }

    public function messages(){
        return [
            'name.required'             => 'Введите название места',
            'name.unique'               => 'Название места должно быть уникальным',
            'name.max'                  => 'Название места должно быть не больше :max',
            'name.alpha'               => 'Название места не может содержать цифр',

            'places_type.required'      => 'Тип места должно быть выбрано',

            'image.image'               => 'Изображение должно быть изображением',
            'image.mimes'               => 'Изображение должно быть изображением',
        ];
    }
}
