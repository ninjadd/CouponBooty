<?php

namespace App\Http\Controllers;

use App\Marketplace;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    /**
     * MarketplaceController constructor.
     */
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
        $marketPlaces = Marketplace::all();

        return view('marketplace.index', compact('marketPlaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketplace.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:3'
        ]);

        $marketPlace = new Marketplace();
        $marketPlace->user_id = auth()->id();
        if (!empty($request->title)) {
            $marketPlace->title = $request->title;
            $marketPlace->slug = str_slug($request->title);
        }
        $marketPlace->body = $request->body;
        $marketPlace->categories = $request->categories;
        $marketPlace->save();

        return redirect('marketplace')->with('status', 'New Marketplace created! You go girl, or Larry.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marketplace  $marketplace
     * @return \Illuminate\Http\Response
     */
    public function show(Marketplace $marketplace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marketplace  $marketplace
     * @return \Illuminate\Http\Response
     */
    public function edit(Marketplace $marketplace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marketplace  $marketplace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marketplace $marketplace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marketplace  $marketplace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marketplace $marketplace)
    {
        //
    }
}
