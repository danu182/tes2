<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierStoreRequest extends FormRequest
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
            'nameSupplier' => 'required|max:100' , 
            'contact_person'=>'required|max:100', 
            'phone' =>'required|max:100',
            'email' =>'required|max:100|email', 
            'address' =>'required|max:100',
            'description' => 'nullable',
        ];
    }
}
