<?php

namespace App\Repo;

use App\Repo\SlideRepositoryInterface;

use App\Models\Slide;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class SlideRepository implements SlideRepositoryInterface
{
	public function updateSlide($request, $id)
	{
		$slide = Slide::find($id);

		switch ($id) {
			case 1:
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
			$allRequestParameter = Arr::except($allRequestParameter, ['_method', '_token', '_key', 'order', 'key']);
			$allRequestParameter['image'] = $arrImageOriginal;
			$allRequestParameter['text_logo'] = $textLogoImageOriginal;
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

			case 2:
			$allRequestParameter = $request->all();
			$allRequestParameter = Arr::except($allRequestParameter, ['_method', '_token', '_key', 'order', 'key']);
			break;

			case 3:
			$slide->value = json_decode($slide->value);
			$allRequestParameter = $request->all();
			$allRequestParameter = Arr::except($allRequestParameter, ['_method', '_token', '_key', 'order', 'key']);

			if (isset($slide->value->file)){
				$allRequestParameter['file'] = $slide->value->file;
			}
			if ($request->hasFile('file')) {
				if ($request->file->isValid()) {
					$path = $request->file->store(config('custom.file_storage.upload_path'));
					$path = str_replace('public/', '', $path);
					if (isset($slide->value->file)) {
						Storage::delete('public/' . $slide->value->file);
					}
				}
				$allRequestParameter['file'] = $path;
			}

			if (isset($slide->value->file_1)) {
				foreach ($slide->value->file_1 as $key => $value) {
					// dd($value);
					if (isset($slide->value->file_1[$key])) {
			// dd($value->file_1[$key]);
						$allRequestParameter['file_1'][$key] = $value;
					}
				}
			}
			$allFileRequest = $request->allFiles();
// dd($allFileRequest['file_1']);
			if (!empty($allFileRequest['file_1'])) {
				foreach ($allFileRequest['file_1']  as $key => $item) {	
					if ($item->isValid()) {
						$path = $item->store(config('custom.file_storage.upload_path'));
						$path = str_replace('public/', '', $path);
						// dd($slide->value->file_1[$key]);
						if (isset($slide->value->file_1[$key])) {
							Storage::delete('public/' . $slide->value->file_1[$key]);
						}

						$allRequestParameter['file_1'][$key] = $path;
					}
				}
			}

			if (isset($slide->value->file_2)) {
				foreach ($slide->value->file_2 as $key => $value) {
					if (isset($slide->value->file_2[$key])) {
						$allRequestParameter['file_2'][$key] = $value;
					}
				}
			}

			$allFileRequest = $request->allFiles();
			if (!empty($allFileRequest['file_2'])) {
				foreach ($allFileRequest['file_2']  as $key => $item) {
					if ($item->isValid()) {
						$path = $item->store(config('custom.file_storage.upload_path'));
						$path = str_replace('public/', '', $path);
						if (isset($slide->value->file_2[$key])) {
							Storage::delete('public/' . $slide->value->file_2[$key]);
						}

						$allRequestParameter['file_2'][$key] = $path;
					}
				}
			}

			break ;

			case 4:
			$allRequestParameter = $request->all();
			$allRequestParameter = Arr::except($allRequestParameter, ['_method', '_token', '_key', 'order', 'key']);
			$slide->value = json_decode($slide->value);

			if (isset($slide->value->slide)) {
				foreach ($slide->value->slide as $key => $value) {
					if (isset($slide->value->slide[$key]->image)) {
						$allRequestParameter['slide'][$key]['image'] = $slide->value->slide[$key]->image;
					}
				}
			}

			$allFileRequest = $request->allFiles();
			if (!empty($allFileRequest['slide'])) {
				foreach ($allFileRequest['slide']  as $key => $item) {
					if ($item['image']->isValid()) {
						$path = $item['image']->store(config('custom.file_storage.upload_path'));
						$path = str_replace('public/', '', $path);
						if (isset($slide->value->slide[$key]->image)) {
							Storage::delete('public/' . $slide->value->slide[$key]->image);
						}

						$allRequestParameter['slide'][$key]['image'] = $path;
					}
				}
			}
			break;

			case 5:
			$slide->value = json_decode($slide->value);
			$allRequestParameter = $request->all();
			$allRequestParameter = Arr::except($allRequestParameter, ['_method', '_token', '_key', 'order','key']);

			if (isset($slide->value->carousel)) {
				foreach ($slide->value->carousel as $key => $carousel) {
					if (isset($carousel->image)) {
						$allRequestParameter['carousel'][$key]['image'] = $carousel->image;
					}
				}
			}
			$allImageRequest = $request->allFiles();

			if (!empty($allImageRequest)) {
				foreach ($allImageRequest['carousel'] as $key => $carousel) {
					if ($carousel['image']->isValid()) {
						$path = $carousel['image']->store(config('custom.file_storage.upload_path'));
						$path = str_replace('public/', '', $path);

						if (isset($slide->value->carousel[$key]->image)) {
							Storage::delete('public/' . $slide->value->carousel[$key]->image);
						}

						$allRequestParameter['carousel'][$key]['image'] = $path;
					}
				}
			}

			break;

			case 6:
			$slide->value = json_decode($slide->value);
			$allRequestParameter = $request->all();
			$allRequestParameter = Arr::except($allRequestParameter, ['_method', '_token', '_key', 'order','key']);

			if (isset($slide->value->image)) {
				foreach ($slide->value->image as $key => $image) {
					$allRequestParameter['image'][$key] = $image;
				}
			}

			$allImageRequest = $request->allFiles();
			if (!empty($allImageRequest)) {
				foreach ($allImageRequest['image'] as $key => $image) {
					if ($image->isValid()) {
						$path = $image->store(config('custom.file_storage.upload_path'));
						$path = str_replace('public/', '', $path);

						if (isset($slide->value->image->$key)) {
							Storage::delete('public/' . $slide->value->image->$key);
						}

						$allRequestParameter['image'][$key] = $path;
					}
				}
			}
			break;

			case 7:
			$slide->value = json_decode($slide->value);
			$allRequestParameter = $request->all();
			$allRequestParameter = Arr::except($allRequestParameter, ['_method', '_token', '_key', 'order', 'key']);

			if (isset($slide->value->phone)) {
				foreach ($slide->value->phone as $key => $phone) {
					$allRequestParameter['phone'][$key]['image'] = $phone->image;
				}
			}

			$allImageRequest = $request->allFiles();

			if (!empty($allImageRequest)) {
				foreach ($allImageRequest['phone'] as $key => $phone) {
					if ($phone['image']->isValid()) {
						$path = $phone['image']->store(config('custom.file_storage.upload_path'));
						$path = str_replace('public/', '', $path);

						if (isset($slide->value->phone->$key)) {
							Storage::delete('public/' . $slide->value->phone->$key);
						}

						$allRequestParameter['phone'][$key]['image'] = $path;
					}
				}
			}

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

		return $slide;
	}
}
