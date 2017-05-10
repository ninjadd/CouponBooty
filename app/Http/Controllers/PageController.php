<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
class PageController extends Controller
{
    public function welcome(Request $request)
    {
        $offers = Offer::paginate(6);

        return view('pages.welcome', compact('offers'));
    }
}
