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
        $slug = Str::slug($request->input('name')) . '-' . Str::random(5);
        $adv = Advertisement::create([
            'name' => $request->input('name'),
            'slug' => $slug,
            'user_id' => Auth::id()
        ]);
    }
}
