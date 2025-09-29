<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UomStoreRequest extends FormRequest
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
            'kodeUom' => 'required|unique:uoms,kodeUom|max:100' , 
            'nameUom' => 'required|unique:uoms,nameUom|max:100' , 
            'description' => 'nullable',
        ];
    }
}
