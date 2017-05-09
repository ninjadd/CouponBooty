<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Type;

class DashBoardController extends Controller
{

    /**
     * DashBoardController constructor.
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
            $offers = Offer::archive(0)->get();
        }

        if ($archive == 1) {
            $offers = Offer::archive($archive)->get();
        }

        $archived = Offer::archive(1)->get();

        $types = Type::all();

        return view('dashboard.index', compact('offers', 'archived', 'types'));
    }
}
