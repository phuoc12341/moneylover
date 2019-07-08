<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenuRequest extends FormRequest
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
            'name' => 'bail|required|unique:menus,name|max:255',
            'link' => 'bail|required|url|unique:menus,link|max:255',
            'type' => 'required|in:' . config('custom.menu.header_menu') . ',' . config('custom.menu.footer_menu'),
            'order' => 'bail|nullable|unique:menus,order|integer|max:255',
        ];
    }
}
