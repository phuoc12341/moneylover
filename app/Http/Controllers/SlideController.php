<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slide;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listSlide = Slide::all();
        $compact = [
            'listSlide' => $listSlide,
        ];

        return view('slide.index', $compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $slide = Slide::find($id);
        $slide->value = json_decode($slide->value);

        return view('slide.edit' . $id, ['slide' => $slide]);
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
        $slide = Slide::find($id);
        $slide->value = json_decode($slide->value);
        $arrImageOriginal = [];
        $textLogoImageOriginal = '';

        if (isset($slide->value->image)) {
            $arrImageOriginal = $slide->value->image;
        }

        if (isset($slide->value->text_logo)) {
            $textLogoImageOriginal = $slide->value->text_logo;
        }

        $allRequestParameter = $request->all();
        $allRequestParameter = Arr::except($allRequestParameter, ['_method', '_token', '_key', 'order']);
        $allRequestParameter['image'] = $arrImageOriginal;
        $allRequestParameter['text_logo'] = $textLogoImageOriginal;

        switch ($id) {
            case 1:
                if ($request->hasFile('image')) {
                    foreach ($request->file('image') as $key => $image) {
                        if ($image->isValid()) {
                            $path = $image->store(config('custom.file_storage.upload_path'));
                            $path = str_replace('public/', '', $path);
                            if (isset($arrImageOriginal[$key])) {
                                Storage::delete('public/' . $arrImageOriginal[$key]);
                            }

                            $allRequestParameter['image'][$key] = $path;

                            $allRequestParameter['image'] = array_replace($arrImageOriginal, $allRequestParameter['image']);

                        }
                    }
                };

                if ($request->hasFile('text_logo')) {
                    if ($request->file('text_logo')->isValid()) {
                        $textLogoImageRequest = $request->file('text_logo');
                        $path = $textLogoImageRequest->store(config('custom.file_storage.upload_path'));
                        $path = str_replace('public/', '', $path);

                        if (empty($textLogoImageOriginal)) {
                            Storage::delete('public/' . $textLogoImageOriginal);
                        }

                        $allRequestParameter['text_logo'] = $path;
                    }
                };

                break;
            
            default:

                break;
        }

        $valueJsonEncoded = json_encode($allRequestParameter);
        $slide->key = $request->key;
        $slide->value = $valueJsonEncoded;

        if (isset($request->order)) {
            $slide->order = $request->order;
        }

        $slide->save();

        return redirect()->route('slide.index');
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
