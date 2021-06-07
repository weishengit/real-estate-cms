<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyValidation extends FormRequest
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
            'title' => 'required|string|max:255|unique:properties,title,'. $this->property->id,
            'area' => 'required',
            'slug' => 'required|alpha_dash|unique:properties,slug,'. $this->property->id,
            'address' => 'required',
            'introduction' => 'required|string|max:150',
            'description' => 'required|string|max:2000',
            'type' => 'required',
            'cost' => 'required',
            'cover_image' => 'mimes:jpg,jpeg,png|max:8096'
        ];
    }
}
