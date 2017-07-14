<?php

namespace App\Http\Controllers;

use App\Store;
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
        $filter = $request->filter;

        if (empty($filter)) {
            $offers = Offer::archive(0)->get();
        }

        if ($filter == 'archived') {
            $offers = Offer::archive(1)->get();
        }

        if ($filter == 'staged') {
            $offers = Offer::archive(2)->get();
        }

        $archived = Offer::archive(1)->get();

        $menuStores = Store::offersFromStores();

        return view('dashboard.index', compact('offers', 'archived', 'menuStores'));
    }
}
