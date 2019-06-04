<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Arr;

class UpdateMenuRequest extends FormRequest
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
        $idMenu = Arr::get($this->route()->parameters(), 'menu');

        return [
            'name' => 'bail|required|unique:menus,name,' . $idMenu . '|max:255',
            'link' => 'bail|required|url|unique:menus,link,' . $idMenu . '|max:255',
            'type' => 'required|in:' . config('custom.menu.header_menu') . ',' . config('custom.menu.footer_menu'),
            'order' => 'bail|nullable|unique:menus,order,' . $idMenu . '|integer|max:255',
        ];
    }
}
