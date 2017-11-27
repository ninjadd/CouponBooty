<?php

namespace App\Http\Controllers;

use App\BannerAd;
use App\Marketplace;
use App\Type;
use Illuminate\Http\Request;

class BannerAdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerAds = BannerAd::all();

        return view('bannerad.index', compact('bannerAds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $marketplace = Marketplace::find($request->marketplace);
        $types = Type::all();

        return view('bannerad.create', compact('marketplace', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware($request, [
            'marketplace_id' => 'required|integer',
            'type_id' => 'required|integer',
            'title' => 'required|max:50',
            'body' => 'required'
        ]);

        $bannerAd = new BannerAd();
        $bannerAd->user_id = auth()->id();
        $bannerAd->marketplace_id = $request->marketplace_id;
        $bannerAd->type_id = $request->type_id;
        $bannerAd->title = $request->title;
        $bannerAd->slug = str_slug($request->title);
        $bannerAd->body = $request->body;
        $bannerAd->categories = $request->categories;
        $bannerAd->start_date =  (!empty($request->start_date)) ? date('Y-m-d H:i:s', strtotime($request->start_date)) : $request->start_date;
        $bannerAd->end_date =  (!empty($request->end_date)) ? date('Y-m-d H:i:s', strtotime($request->end_date)) : $request->end_date;
        $bannerAd->archive = $request->archive;
        $bannerAd->save();

        return redirect('marketplace')->with('status', 'New Banner Ad Created! Yahoo, you are the greatest woman (or Larry) ever!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BannerAd  $bannerAd
     * @return \Illuminate\Http\Response
     */
    public function show(BannerAd $bannerAd)
    {
        return view('bannerad.show', compact('bannerAd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BannerAd  $bannerAd
     * @return \Illuminate\Http\Response
     */
    public function edit(BannerAd $bannerAd)
    {
        $types = Type::all();

        return view('bannerad.edit', compact('bannerAd', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BannerAd  $bannerAd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BannerAd $bannerAd)
    {
        $this->middleware($request, [
            'marketplace_id' => 'required|integer',
            'type_id' => 'required|integer',
            'title' => 'required|max:50',
            'body' => 'required'
        ]);

        $bannerAd->user_id = auth()->id();
        $bannerAd->marketplace_id = $request->marketplace_id;
        $bannerAd->type_id = $request->type_id;
        $bannerAd->title = $request->title;
        $bannerAd->slug = str_slug($request->title);
        $bannerAd->body = $request->body;
        $bannerAd->categories = $request->categories;
        $bannerAd->start_date =  (!empty($request->start_date)) ? date('Y-m-d H:i:s', strtotime($request->start_date)) : $request->start_date;
        $bannerAd->end_date =  (!empty($request->end_date)) ? date('Y-m-d H:i:s', strtotime($request->end_date)) : $request->end_date;
        $bannerAd->archive = $request->archive;
        $bannerAd->save();

        return redirect('bannerad')->with('status', 'Banner Ad Updated! You know you are good when you can do this.');
    }

    /**
     * @param BannerAd $bannerAd
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(BannerAd $bannerAd)
    {
        $bannerAd->delete();

        return redirect('bannerad')->with('status', 'Banner Ad Deleted! Are you happy now?');
    }
}
