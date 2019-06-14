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
	            $saveImage = '';
	            if (isset($slide->value->file)){
	                $saveImage = $slide->value->file;
	            }
	            $allRequestParameter = $request->all();
	            $allRequestParameter = Arr::except($allRequestParameter, ['_method', '_token', '_key', 'order']);
	            $allRequestParameter['file'] = $saveImage;
	            if ($request->hasFile('file')) {
	                $file = $request->file;
	                $name = $request->file->getClientOriginalName();
	                $nameFile = str_random(5).$name;
	                $file->move(config('app.img_path'), $nameFile);
	                if (isset($slide->value->file)) {
	                    unlink(config('app.img_path') . $slide->value->file);
	                }
	                $allRequestParameter['file'] = $nameFile;
	            }
	            $file_1 = [];
	            $saveImage_1 = [];
	            if (isset($slide->value->file_1)) {
	                $saveImage_1 = $slide->value->file_1;
	            }
	            $allRequestParameter['file_1'] = $saveImage_1;

	            if($request->hasFile('file_1')) {
	                foreach ($request->file('file_1') as $key => $item) {
	                    $name = $item->getClientOriginalName();
	                    $newName = str_random(5) . $name;
	                    $item->move(config('app.img_path'), $newName);
	                    if (isset($slide->value->file_1)) {
	                        foreach ($slide->value->file_1 as $item) {
	                            if (isset($item->img)) {
	                                unlink(config('app.img_path') . $item->img);
	                            }
	                        }
	                        $file_1[] = ['img' => $newName];
	                    }
	                }
	            }
	            $allRequestParameter['file_1'] = array_replace($saveImage_1, $file_1);
	            $file_2 = [];
	            $saveImage_2 = [];
	            if (isset($slide->value->file_2)) {
	                $saveImage_2 = $slide->value->file_2;
	            }
	            $allRequestParameter['file_2'] = $saveImage_2;
	            if($request->hasFile('file_2')) {
	                foreach ($request->file('file_2') as $item) {
	                    $name = $item->getClientOriginalName();
	                    $newName = str_random(5) . $name;
	                    $item->move(config('app.img_path'), $newName);
	                    if (isset($slide->value->file_2)) {
	                        foreach ($slide->value->file_2 as $key => $item) {
	                            if (isset($item->img)) {
	                                unlink(config('app.img_path') . $item->img);
	                            }
	                        }
	                        $file_2[] = ['img' => $newName];
	                    }
	                }
	            }
	            $allRequestParameter['file_2'] = array_replace($saveImage_2, $file_2);
	            $allRequestParameter = Arr::except($allRequestParameter, ['_method', '_token', '_key', 'order']);
	            
	            break ;

			case 4:
			$allRequestParameter = $request->all();
			$allRequestParameter = Arr::except($allRequestParameter, ['_method', '_token', '_key', 'order', 'key']);
			$slide->value = json_decode($slide->value);
			$image = [];

			if (isset($slide->value->slide)) {
				foreach ($slide->value->slide as $key => $value) {
					if (isset($slide->value->slide[$key]->image)) {
						$allRequestParameter['slide'][$key]['image'] = $slide->value->slide[$key]->image;
					}
				}
			}

			$allFileRequest = $request->allFiles();
			if (isset($allFileRequest['slide'])) {
				foreach ($allFileRequest['slide']  as $key => $item) {
					$name = $item['image']->getClientOriginalName();
					$newName = uniqid() . '.' . $name;
					$item['image'] -> move(config('app.img_path'), $newName);
					if (isset($slide->value->file)) {
						unlink(config('app.img_path') . $slide->value->file);
					}
					$allRequestParameter['slide'][$key]['image'] = $newName;
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
