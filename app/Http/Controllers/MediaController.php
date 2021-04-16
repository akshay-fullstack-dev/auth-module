<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadReqeust;
use Illuminate\Http\Request;

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
        $destinationPath = storage_path('app/public/uploads/images');
        $image->move($destinationPath, $name);
        $this->save();
        return back()->with('success', 'Image Upload successfully');
    }
}
