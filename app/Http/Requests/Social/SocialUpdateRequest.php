<?php

namespace App\Http\Requests\Social;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Arr;

class SocialUpdateRequest extends FormRequest
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
        $idSocial = Arr::get($this->route()->parameters(), 'social');

        return [
            'url' => 'required|url|unique:socials,url,' . $idSocial . ',id,deleted_at,NULL',
            'icon' => 'required|unique:socials,icon,' . $idSocial . ',id,deleted_at,NULL|max:255',
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
