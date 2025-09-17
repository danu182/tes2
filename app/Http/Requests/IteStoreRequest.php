<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IteStoreRequest extends FormRequest
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
            'itemName' => 'required|unique:items,itemName|max:100',
            'uom' => 'nullable',
            'description' => 'nullable|max:200',
        ];
    }
}
