<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'site_name' => 'required|max:255',
            'email' => 'required|email',
            'phone'=> 'required|numeric',
            'address' => 'required|min:5|max:255',
            'first_logo' => 'image|max:2048',
            'not_first_logo' => 'image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'site_name.required' => __('messages.site_name_required'),
            'site_name.max' => __('messages.site_name_max'),
            'email.required' => __('messages.email_required'),
            'email.email' =>  __('messages.email_email'),
            'phone.required' => __('messages.phone_required'),
            'phone.numeric' => __('messages.phone_numeric'),
            'address.required' => __('messages.address_required'),
            'address.min' => __('messages.address_min'),
            'address.max' => __('messages.address_max'),
            'first_logo.image' => __('messages.first_logo_image'),
            'first_logo.max' => __('messages.first_logo_max'),
            'not_first_logo.image' => __('messages.not_first_logo_image'),
            'not_first_logo.max' => __('messages.not_first_logo_max'),
        ];
    }
}
