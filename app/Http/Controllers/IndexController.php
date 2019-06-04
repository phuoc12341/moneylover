<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

class IndexController extends Controller
{
    public function index()
    {
    	$footerMenu = Menu::where('type', config('custom.menu.footer_menu'))->get();
    	$headerMenu = Menu::where('type', config('custom.menu.header_menu'))->get();

    	$compact = [
    		'footerMenu' => $footerMenu,
    		'headerMenu' => $headerMenu,
    	];

    	return view('index', $compact);
    }
}
