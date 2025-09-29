<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
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
            'kodeItem' => 'required|unique:items,kodeItem|max:100',
            'nameItem' => 'required|max:200',
            'categoryItem_id' => 'required|exists:category_items,id',
            'tipeItem_id' => 'required|exists:tipe_items,id',
            'uom_id' => 'required|exists:uoms,id',
            'barcode' => 'nullable',
            'foto' => 'nullable',
            'seri' => 'nullable',
            'description' => 'nullable|max:200',
        ];
    }
}
