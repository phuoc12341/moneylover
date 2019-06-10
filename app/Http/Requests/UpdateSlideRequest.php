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
        return false;
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
                    'url' => 'bail|required|url|unique:socials,url|max:255',
                    'icon' => 'bail|required|unique:socials,icon|max:255',
                ];

                break;
            
            case 2:
                return [
                    //
                ];

                break;

            default:
                # code...
                break;
        }
    }
}
