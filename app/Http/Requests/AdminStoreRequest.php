<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreRequest extends FormRequest
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
        $isUpdate = $this->route('id') ? true : false;

        return [
            'name' => 'required',
            'role_id' => 'required',
            'email'=> 'required',
            'gender'=> 'required',
            'phone_number'=> 'required',
            'dob'=> 'required',
            'password' => $isUpdate ? 'nullable|string|min:6' : 'required|string|min:6',
            'status' => 'required',
            'description'=> 'required',
            'address'=> 'required',
            'zip_code'=> 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
