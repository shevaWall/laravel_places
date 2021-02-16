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
            'name'          =>  'required|unique:places|max:255',
            'places_type'   =>  'required',
            'image'         =>  'image',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Введите название места'
        ];
    }
}
