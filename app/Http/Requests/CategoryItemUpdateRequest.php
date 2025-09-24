<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryItemUpdateRequest extends FormRequest
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
        // Mendapatkan instance model CategoryItem secara langsung dari route.
        // Nama parameter route biasanya adalah nama model dalam snake_case (category_item).
        $categoryItem = $this->route('category_item'); // Ambil ID dari route, sesuaikan dengan route Anda
            // Atau bisa juga $userId = $this->id; jika ID ada di form request

        return [
            'nameCategory' => [
                    'required',
                    // Rule::unique('category_items')->ignore($categoryItem), // Mengecualikan categoryItem yang sedang diedit
                    Rule::unique('category_items', 'nameCategory')->ignore($categoryItem),  //  Mengecualikan categoryItem yang sedang diedit

                    // Rule::unique('category_items', 'nameCategory')->ignore($categoryItem)

                ],
        ];
    }
}
