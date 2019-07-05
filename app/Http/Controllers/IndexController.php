<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Slide;
use App\Models\Social;
use App\Models\Setting;

class IndexController extends Controller
{
    public function index()
    {
        $listSlide = Slide::all();
        foreach ($listSlide as $slide) {
            $slide->value = json_decode($slide->value);
        }
        $listSocial = Social::all();
        $listSetting = Setting::all()->first();

    	$footerMenu = Menu::where('type', config('custom.menu.footer_menu'))->get();
    	$headerMenu = Menu::where('type', config('custom.menu.header_menu'))->get();

    	$compact = [
            'listSlide' => $listSlide,
    		'footerMenu' => $footerMenu,
    		'headerMenu' => $headerMenu,
            'listSocial' => $listSocial,
            'listSetting' => $listSetting,
    	];

    	return view('index', $compact);
    }
}
