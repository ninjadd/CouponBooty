<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Cookie\CookieJar;
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
    public function index(CookieJar $cookieJar, Request $request)
    {
        // Offer::whereDate('end_date', '=',  date("Y-m-d",strtotime("-1 day")))->update(['archive' => 1]);

        $filter = $request->filter;
        $filter_user = $request->filter_user;
        $user_filter = $request->cookie('user_filter');

        if (!empty($filter_user)) {
            $cookieJar->queue(cookie('user_filter', $filter_user, 480));
        }

        if (empty($user_filter)) {
            $user_id = auth()->id();
        }

        if (!empty($user_filter)) {
            $user_id = $user_filter;
        }

        if ((!empty($filter_user)) && ($filter_user != $user_filter)) {
            $user_id = $filter_user;
        }

        if (empty($filter)) {
            $archived = 0;
        }

        if ($filter == 'archived') {
            $archived = 1;
        }

        if ($filter == 'staged') {
            $archived = 2;
        }

        if ($user_id == 'all') {
            $offers = Offer::archive($archived)->get();
        } else {
            $offers = Offer::archive($archived)->where('user_id', $user_id)->get();
        }


        return view('dashboard.index', compact('offers'));
    }
}
