<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpeg,jpg,webp',
            'quantityInStock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string',
            // 'ref' => 'required|max:255|string',
            'seller' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
