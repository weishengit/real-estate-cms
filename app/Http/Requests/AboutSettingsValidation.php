<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutSettingsValidation extends FormRequest
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
            'header' => 'required|string|max:150',
            'cover_image' => 'mimes:jpg,jpeg,png|max:8096',
            'side_image' => 'mimes:jpg,jpeg,png|max:8096',
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:2000'

        ];
    }
}
