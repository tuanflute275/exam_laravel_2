<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:1|max:100',
            'image' => 'required|mimes:png,jpg',
            'price' => 'required|numeric|gte:0',
            'sale_price' => 'required|numeric|lte:price'
        ];
    }
}
