<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index(Request $request)
    {
        $page = 3;
        return Advertisement::paginate(5);
    }
}
