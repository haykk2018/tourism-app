<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'file' => 'mimes:img,png,jpg,jpeg,bmp|max:2048',
            'title' => [Rule::unique('pages')->ignore($this->request->get('id')), 'required', 'max:99'],//->ignore($this->request->get('id') for except matching him to himself
            'meta_description' => ['max:255'],
            'keywords' => ['max:255'],
            'description' => ['max:255'],
            'menu_name' => ['nullable', 'max:99', Rule::unique('pages')->ignore($this->request->get('id'))], //can be null,but if exist unique
            'content' => [],
            'category' => [],
            'img_src' => ['string', 'max:255'],
            'img_alt' => ['max:255'],
        ];
    }
}
