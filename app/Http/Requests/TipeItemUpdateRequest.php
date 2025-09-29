<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TipeItemUpdateRequest extends FormRequest
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

        $tipeItems = $this->route('tipe_items'); // Ambil ID dari route, sesuaikan dengan route Anda
            // Atau bisa juga $userId = $this->id; jika ID ada di form request

        return [
            'nameTipe' => [
                    'required',
                    // Rule::unique('category_items')->ignore($categoryItem), // Mengecualikan categoryItem yang sedang diedit
                    Rule::unique('tipe_items', 'nameTipe')->ignore($tipeItems),  //  Mengecualikan categoryItem yang sedang diedit

                    // Rule::unique('category_items', 'nameCategory')->ignore($categoryItem)

                ],
        ];
    }
}
