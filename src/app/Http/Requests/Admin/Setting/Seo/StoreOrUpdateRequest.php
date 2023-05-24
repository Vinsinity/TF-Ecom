<?php

namespace App\Http\Requests\Admin\Setting\Seo;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'keywords' => 'required|string',
            'robots' => 'nullable|string',
            'sitemap' => 'nullable|string',
            'rss' => 'nullable|string',
            'google_verify' => 'nullable|string',
            'facebook_verify' => 'nullable|string',
        ];
    }
}
