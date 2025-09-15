<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sisterCompanyEditRequest extends FormRequest
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
            // "code"=> 'required|unique:sister_companies,code|max:100',
            "name"=> 'required|max:100',
            "picUser"=> 'nullable|max:100',
            "tlp"=> 'nullable|max:100',
            "email"=> 'nullable|max:100',
            "address"=> 'required|max:100',
            "description"=> 'nullable|max:100',
        ];
    }
}
