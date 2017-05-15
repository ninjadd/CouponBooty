<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class PageController extends Controller
{
    public function welcome()
    {
        $offers = Offer::paginate(12);

        return view('pages.welcome', compact('offers'));
    }

    public function results(Request $request)
    {
        $offers = Offer::search($request->search_text)->get();

        return view('pages.results', compact('offers', 'request'));
    }

}
