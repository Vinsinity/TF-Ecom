<?php

namespace App\Http\Requests\Admin\Campaign\Code;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'code' => 'required',
            'amount' => 'required',
            'type' => 'required|in:price,percentage',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }
}
