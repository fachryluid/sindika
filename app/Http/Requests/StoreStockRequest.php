<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
          'supplier_id' => 'required|integer',
          'medicine_id' => 'required|integer',
          'quantity' => 'required|integer',
          'order_cost' => 'required|string',
          'storage_cost' => 'required|string',
          'order_date' => 'required|date',
          'expected_delivery' => 'required|date',
          'price' => 'required|string',
          'expired_date' => 'required|date'
        ];
    }
}
