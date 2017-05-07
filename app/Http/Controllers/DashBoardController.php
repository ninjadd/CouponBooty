<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class DashBoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $archive = $request->archive;

        if (empty($archive)) {
            $offers = Offer::all();
        }

        if ($archive == 1) {
            $offers = Offer::archive($archive)->get();
        }

        $archived = Offer::archive(1)->get();

        return view('dashboard.index', compact('offers', 'archived'));
    }
}
