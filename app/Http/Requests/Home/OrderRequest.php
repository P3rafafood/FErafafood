<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'order_name'    => 'required|string',
            'table_number'  => 'required|numeric',
            'payment'       => 'required|in:cash,debit'
        ];
    }
}
