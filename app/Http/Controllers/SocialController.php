<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Social;
use App\Http\Requests\Social\SocialCreateRequest;
use App\Http\Requests\Social\SocialUpdateRequest;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listSocial = Social::all();
        $compact = [
            'listSocial' => $listSocial,
        ];

        return view('socials.index', $compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('socials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialCreateRequest $request)
    {
        $social = new Social;
        $social->url = $request->url;
        $social->icon = $request->icon;
        $social->save();

        return redirect()->route('social.index')->with('success', __('messages.success_create_social'));
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
        $social = Social::find($id);

        return view('socials.edit', ['social' => $social]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialUpdateRequest $request, $id)
    {
        $social = Social::find($id);

        $social->url = $request->url;
        $social->icon = $request->icon;
        $social->save();

        return redirect()->back()->with('success', __('messages.success_update_social'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social = Social::find($id);
        $social->delete();

        return redirect()->back()->with('success', __('messages.success_delete_social'));
    }
}
