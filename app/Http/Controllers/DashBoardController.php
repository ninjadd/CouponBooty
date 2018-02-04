<?php

namespace App\Http\Controllers;

use App\Store;
use App\User;
use App\Offer;
use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;

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
     * @param CookieJar $cookieJar
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(CookieJar $cookieJar, Request $request) {

        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day', strtotime($today)));

        Offer::where('archive', 2)->whereDate('start_date', $today)->update(['archive' => 0]);
        Offer::where('archive', 0)->whereDate('end_date', $yesterday)->update(['archive' => 1]);

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
            $filter = 'Live';
        }

        if ($filter == 'archived') {
            $archived = 1;
            $filter = 'Archived';
        }

        if ($filter == 'staged') {
            $archived = 2;
            $filter = 'Staged';
        }


        if ($user_id == 'all') {
            $stores = Store::archive($archived)->get();
            $data = ['user' => 'All', 'list' => 'Stores', 'filter' => $filter];
        } else {
            $stores = Store::archive($archived)->where('manager_id', $user_id)->get();
            $user = User::find($user_id);
            $data = ['user' => $user->name, 'list' => 'Stores', 'filter' => $filter];
        }


        return view('dashboard.index', compact('stores', 'data'));
    }
}
