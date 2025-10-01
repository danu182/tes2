<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequestStoreRequest extends FormRequest
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
            'pr_no' => 'required|unique:purchase_requisitions,no_pr|max:100',
            'sisterCompany_id' => 'required|exists:sister_companies,id', 
            'title' => 'required',
            'sifat' => 'required|numeric',
            'jenis' => 'required|numeric',
            'description'=>'nullable',
            // 'requested_by_user_id' => 'required|exists:users,id',
            'status' => 'required|exists:status_approvals,id',
            'total_amount' => 'required|numeric',
            // 'createded_by_user_id' =>'required|exists:users,id',
        ];
    }
}
