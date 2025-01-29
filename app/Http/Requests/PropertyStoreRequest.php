<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
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
        'property_type' => 'required',
        'max_rooms' => 'required',
        'beds' => 'required',
        'baths' => 'required',
        'price' => 'required',
        'status' => 'required|in:Sale,Sold,Rent',
        'area' => 'required',
        'zip_code' => 'required',
        'address' => 'required',
        'city' => 'required',
        'agent_id' => 'required|exists:users,id',
        'description' => 'required',
        // 'media' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
         'additional_features' => 'required|array|min:1', // Ensure it's an array with at least one item
        // 'additional_features.*' => 'string', // Validate that each feature is a string
        ];
    }

    // public function status()
    // {
    //     $rules = [
    //         'status' => 'required|in:sale,sold,rent', // Only validate the status field
    //     ];

    //     // Add any additional conditions based on your needs
    //     return $rules;
    // }

}

?>
