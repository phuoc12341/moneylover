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
            case 1:
            return [
                'text_logo' => 'max:256',
                'intro' => 'required|max:512',
                'image.*' => 'image',
                'button.*.text' => 'required|max:512',
                'button.*.color' => 'required|max:512',
                'button.*.link' => 'required|url',
                'button.*.icon' => 'required|max:512',
            ];

            case 2:
            return [
                'describe' => 'required|min:5|max:256',
                'content' => 'required|min:10|max:512',
                'url_youtube' => 'required|url',
            ];

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

            case 4:
            return [
                'slide.*.describe' => 'required|max:256',
                'slide.*.content' => 'required|max:512',
                'slide.*.image' => '|image|max:2048',
            ];

            case 5:
                return [
                    'carousel.*.name' => 'required|min:5|max:256',
                    'carousel.*.quote' => 'required|min:10|max:512',
                    'carousel.*.image' => 'image|max:2048',
                ];

            case 6:
                return [
                    'link_tren' => 'required|url',
                    'link_duoi' => 'required|url',
                    'blog.*.title' => 'required|max:256',
                    'blog.*.link' => 'required|url',
                    'blog.*.content' => 'required|max:2048',
                ];

            case 7:
                return [
                    'title' => 'required|max:256',
                    'phone.*.link' => 'required|url',
                    'phone.*.image' => 'image',
                ];
            
            default:
                return [
                    //
                ];
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
