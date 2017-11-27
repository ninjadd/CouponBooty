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
        $marketplaces = Marketplace::all();

        return view('marketplace.index', compact('marketplaces'));
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

        $marketplace = new Marketplace();
        $marketplace->user_id = auth()->id();
        $marketplace->title = $request->title;
        $marketplace->slug = str_slug($request->title);
        $marketplace->body = $request->body;
        $marketplace->categories = $request->categories;
        $marketplace->save();

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
        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marketplace  $marketplace
     * @return \Illuminate\Http\Response
     */
    public function edit(Marketplace $marketplace)
    {
        return view('marketplace.edit', compact('marketplace'));
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
        $this->validate($request, [
            'title' => 'required|string|min:3'
        ]);

        $marketplace->user_id = auth()->id();
        $marketplace->title = $request->title;
        $marketplace->slug = str_slug($request->title);
        $marketplace->body = $request->body;
        $marketplace->categories = $request->categories;
        $marketplace->save();

        return redirect('marketplace')->with('status', 'Updated Marketplace! Huzzah!!');
    }

    /**
     * @param Marketplace $marketplace
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Marketplace $marketplace)
    {
        $marketplace->delete();

        return redirect('marketplace')->with('status',  'Marketplace deleted :(');
    }
}
