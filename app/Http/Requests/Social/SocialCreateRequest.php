<?php

namespace App\Http\Requests\Social;

use Illuminate\Foundation\Http\FormRequest;

class SocialCreateRequest extends FormRequest
{
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
            'url' => 'bail|required|url|unique:socials,url,NULL,id,deleted_at,NULL',
            'icon' => 'bail|required|unique:socials,icon,NULL,id,deleted_at,NULL|max:20',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'url.required' => __('messages.url_required'),
        ];
    }
}
