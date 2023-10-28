<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function compress(Request $request)
    {
        $image = $request->file('thumbnail');

        /*
            Note: Use $image = base64_decode($request['image'])
            if the image is sent as a base64 encoded image.
        */
        $image_name = time().'_'.$image->getClientOriginalName();
        $path = public_path('images') . "/" . $image_name;

        Image::make($image->getRealPath())->resize(150, 150)->save($path);

        return response()->json(
            [
                'data' => 'Image compressed and added'
            ],
            201
        );
    }


}
