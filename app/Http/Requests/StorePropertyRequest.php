<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'title' => 'required|string|max:255',

            'description' => 'required|string',

            'type' => 'required|in:house,apartment,studio,land,office',

            'price' => 'required|numeric|min:0',

            'deposit' => 'required|numeric|min:0',

            'bedrooms' => 'required|integer|min:0',

            'living_rooms' => 'required|integer|min:0',

            'bathrooms' => 'required|integer|min:0',

            'kitchens' => 'required|integer|min:0',

            'parking' => 'nullable|boolean',

            'surface' => 'nullable|numeric|min:0',

            'city' => 'required|string|max:100',

            'district' => 'required|string|max:100',

            'address' => 'required|string|max:255',

            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

        ];
    }
}