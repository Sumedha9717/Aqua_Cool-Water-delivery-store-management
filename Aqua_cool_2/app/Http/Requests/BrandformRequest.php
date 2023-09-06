<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandformRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'brand_name' => [
                'required',
                'string'
            ],

            'brand_slug' => [
                'required',
                'string'
            ],

            'brand_image' => [
                'nullable',
                'mimes:png,jpeg,jpg'
            ],

        ];
    }
}
