<?php

namespace App\Http\Controllers;

use App\Enums\MediaEnum;
use App\Http\Requests\ImageUploadReqeust;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(ImageUploadReqeust $request)
    {
        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path(MediaEnum::USER_UPLOAD_IMAGE_PATH);
        $image->move($destinationPath, $name);
        $data['path'] = MediaEnum::USER_UPLOAD_IMAGE_PATH;
        return response(['message' => trans('api/media.image_uploaded_success'), 'data' => $data]);
    }
}
