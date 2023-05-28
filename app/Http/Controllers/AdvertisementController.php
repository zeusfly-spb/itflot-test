<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    public function index()
    {
        return Advertisement::paginate(10);
    }

    public function create(Request $request)
    {
        $inputs = $request->all();
        $inputs['slug'] = Str::slug($inputs['name']) . '-' . Str::random(5);
        $inputs['user_id'] = Auth::id();
        $adv = Advertisement::create($inputs);
        return response()->json($adv->toArray());
    }
}
