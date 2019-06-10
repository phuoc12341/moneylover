<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Arr; 

class UpdateSlideRequest extends FormRequest
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
        $idSlide = Arr::get($this->route()->parameters(), 'slide');

        switch ($idSlide) {
            case 2:
            return [
                'describe' => 'required|min:5|max:256',
                'content' => 'required|min:10|max:512',
                'url_youtube' => 'required|url',
            ];
            break;

            case 3:
            return [
                'describe_1' => 'required|min:5|max:256',
                'content_1' => 'required|min:10|max:512',
                'file' => 'image|max:2048',
                'describe_2' => 'required|min:5|max:256',
                'content_2' => 'required|min:10|max:512',
                'file_1.*' => 'image|max:2048',
                'describe_3' => 'required|min:5|max:256',
                'content_3' => 'required|min:10|max:512',
                'file_2.*' => 'image|max:2048',
            ];
            break;
            case 3:
            return [
                'describe' => 'required|min:5|max:256',
                'content' => 'required|min:10|max:512',
                'image' => '|image|max:2048',
            ];
            
            default:
                # code...
            break;
        }

    }

    public function messages()
    {
        return [
            'describe.required' => 'khong the de trong mô tả ',
            'name.min' => trans('validate.name_length'),
            'name.max' => trans('validate.name_length'),
        ];
    }
}
