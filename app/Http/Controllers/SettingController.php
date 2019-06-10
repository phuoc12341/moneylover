<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listSetting = Setting::all();
        $compact = [
            'listSetting' => $listSetting
        ];
        return view('setting.index', $compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('setting.update_or_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('hdg');
        // $setting = Setting::find(1);
        // if (is_null($setting)) {
        $setting = new Setting;
        // }

        $setting->site_name = $request->site_name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;

        if ($request->hasFile('first_logo')) {
            if ($request->file('first_logo')->isValid()) {
                $image = $request->file('first_logo');
                $path = $image->store(config('custom.file_storage.upload_path'));
                $path = str_replace('public/', '', $path);
                // dd($path);
                // if ($setting->first_logo != '' && $setting->first_logo != null) {
                    // Storage::delete($setting->first_logo);

                // $path = $request->first_logo->store(config('custom.file_storage.upload_path'));
                $setting->first_logo = $path;      
            }
        };


        if ($request->hasFile('not_first_logo')) {
            if ($request->file('not_first_logo')->isValid()) {
                $image_logo2 = $request->file('not_first_logo');
                // if ($setting->logo != '' && $setting->logo != null) {
                    // Storage::delete($setting->not_first_logo);
                // }

                $path = $image_logo2->store(config('custom.file_storage.upload_path'));
                $path = str_replace('public/', '', $path);
                $setting->not_first_logo = $path;      
            }
        };
        
        $setting->save();

        return redirect(route('setting.index'));
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
        $setting = Setting::findOrFail($id);
        // dd($setting);
        return view('setting.update_or_create', compact('setting'));
        // dd($setting);
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
        $setting = Setting::findOrFail($id);

        $setting->site_name = $request->site_name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        if ($request->hasFile('first_logo')) {
            if ($request->file('first_logo')->isValid()) {
                $image_logo = $request->file('first_logo');
                if ($setting->first_logo != '' && $setting->first_logo != null) {
                    Storage::delete($setting->first_logo);
                }

                $path = $image_logo->store(config('custom.file_storage.upload_path'));
                $path = str_replace('public/', '', $path);
                $setting->first_logo = $path;      
            }
        };

        if ($request->hasFile('not_first_logo')) {
            if ($request->file('not_first_logo')->isValid()) {
                $image_logo2 = $request->file('not_first_logo');
                if ($setting->not_first_logo != '' && $setting->not_first_logo != null) {
                    Storage::delete($setting->not_first_logo);
                }

                $path = $image_logo2->store(config('custom.file_storage.upload_path'));
                $path = str_replace('public/', '', $path);
                $setting->not_first_logo = $path;      
            }
        };
        $setting->save();



        return redirect()->route('setting.index')->with('success', 'sửa setting thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();

        return redirect()->back()->with('success', __('messages.success_delete_setting'));
    }
}
