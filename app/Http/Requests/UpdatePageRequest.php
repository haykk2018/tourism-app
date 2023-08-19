<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=> ['string', 'max:255'],
            'meta_description'=> ['string', 'max:255'],
            'keywords'=> ['string', 'max:255'],
            'description'=> ['string', 'max:255'],
            'menu_name'=> ['string', 'max:255'],
            'content'=> ['string'],
            'img_src'=> ['string', 'max:255'],
            'img_alt'=> ['string', 'max:255'],
        ];
    }
}
