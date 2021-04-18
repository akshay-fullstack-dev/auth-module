<?php

namespace App\Http\Controllers;

use App\Enums\MediaEnum;
use App\Http\Requests\ImageUploadReqeust;
use  Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadPicture(ImageUploadReqeust $request)
    {
        $image = $request->file('image');
        $name = time() . '.' . 'jpg';
        $destinationPath = public_path(MediaEnum::USER_UPLOAD_IMAGE_PATH . '/' . $name);
        $photo = Image::make($image->getRealPath())
            ->resize(256, 256, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode('jpg', 80)->save($destinationPath);
        $data['path'] = MediaEnum::USER_UPLOAD_IMAGE_PATH . '/' . $name;

        return response(['message' => trans('api/media.image_uploaded_success'), 'data' => $data]);
    }
}
