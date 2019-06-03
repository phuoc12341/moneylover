<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMenu = Menu::all();

        $compact = [
            'listMenu' => $listMenu,
        ];

        return view('menu.index', $compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $menu = new Menu;
        $menu->about_us = $request->about_us;
        $menu->privacy_policy = $request->privacy_policy;
        $menu->career = $request->career;

        if ($request->hasFile('first_logo')) {
            if ($request->file('first_logo')->isValid()) {
                $path = $request->first_logo->store(config('custom.file_storage.upload_path'));
                $path = str_replace('public/', '', $path);
                $menu->first_logo = $path;
            }
        };

        if ($request->hasFile('not_first_logo')) {
            if ($request->file('not_first_logo')->isValid()) {
                $path = $request->not_first_logo->store(config('custom.file_storage.upload_path'));
                $path = str_replace('public/', '', $path);
                $menu->not_first_logo = $path;
            }
        };

        $menu->save();

        return redirect()->route('menu.index', __('messages.success_create_social'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
