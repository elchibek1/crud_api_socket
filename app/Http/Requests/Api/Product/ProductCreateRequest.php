<?php

namespace App\Http\Requests\Api\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:150'],
            'price' => ['required', 'numeric', 'between:0,9999999999.99'],
            'category_id' => ['required', 'exists:categories,id']
        ];
    }
}
