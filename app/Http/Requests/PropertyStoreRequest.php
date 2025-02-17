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
            'additional_features' => 'required|array|min:1', // Ensure it's an array with at least one item
            'payment_type' => 'nullable|in:1,2', // 1 for Full Payment, 2 for Token Amount
            'token_amount' => 'nullable|numeric|min:0', // Nullable but must be a positive number if present
            'property_status' => 'required|in:0,1', // 0 for Inactive, 1 for Active
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
