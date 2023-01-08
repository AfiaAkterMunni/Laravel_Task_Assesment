<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    protected function getRedirectUrl()
    {
        return url()->previous();
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3',
            'short_description' => 'required|string|min:5',
            'description' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png',
            'category' => 'required|numeric',
            'tags' => 'required|array|min:1'
        ];
    }
}
