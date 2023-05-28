<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return Advert::with('user', 'images')->paginate(10);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $adv = Advert::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')) . '-' . Str::random(5),
            'user_id' => Auth::id()
        ]);
        $images = Image::whereIn('id', $request->input('image_ids'))->get();
        $images->each(function ($item) use ($adv) { $item->update(['advert_id' => $adv->id]); });
        $adv->load('images');
        return response()->json($adv->toArray());
    }

    /**
     * @param String $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(String $slug)
    {
        return response()->json(Advert::with('user', 'images')->whereSlug($slug)->first()->toArray());
    }
}
