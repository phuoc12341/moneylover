<?php

namespace App\Repo;

use App\Models\Setting;

class SettingRepository {

	public function getList()
	{
		$listSetting = Setting::all();

		return $listSetting;
	}

	public function create($request)
	{
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

				if ($setting->first_logo != '' && $setting->first_logo != null) {
					Storage::delete($setting->first_logo);
				}

				$setting->first_logo = $path;      
			}
		};


		if ($request->hasFile('not_first_logo')) {
			if ($request->file('not_first_logo')->isValid()) {
				$image_logo2 = $request->file('not_first_logo');
				$path = $image_logo2->store(config('custom.file_storage.upload_path'));
				$path = str_replace('public/', '', $path);

				if ($setting->logo != '' && $setting->logo != null) {
					Storage::delete($setting->not_first_logo);
				}

				$setting->not_first_logo = $path;      
			}
		};

		$setting->save();
		return $setting;
	}

	public function edit($id)
	{
		$setting = Setting::findOrFail($id);
		return $setting;
	}

	public function update($request, $id)
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

		return $setting;
	}

	public function delete($id)
	{
		$setting = Setting::find($id);
		$setting->delete();

		return $setting;
	}
}