<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'image' => 'image|nullable|max: 1999'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $path = $request->file('image')->store();
        $image = Image::create(['user_id' => Auth::id(), 'path' => $path]);
        return response()->json($image->toArray());
    }
}
