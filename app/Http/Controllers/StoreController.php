<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use App\Store;
use App\Network;
use App\Category;

class StoreController extends Controller
{
    /**
     * StoreController constructor.
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
        $stores = Store::all();

        return view('store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $networks = Network::orderBy('name')->get();
        $users = User::all();

        return view('store.create', compact('networks', 'users'));
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
            'name' => 'required|string|unique:stores',
            'network_id' => 'required|integer',
            'manager_id' => 'required|integer',
            'image_url' => 'required|url'
        ]);

        $store = new Store();
        $store->user_id = auth()->id();
        $store->name = $request->name;
        $store->slug = str_slug($request->name);
        $store->title = $request->title;
        $store->body = $request->body;
        $store->network_id = $request->network_id;
        $store->manager_id = $request->manager_id;
        $store->image_url = $request->image_url;
        $store->categories = $request->categories;
        $store->save();

        Offer::where('store_id', $store->id)->update(['image_url' => $request->image_url]);

        return redirect('store')->with('status', 'New Store created I am so proud!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('store.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $networks = Network::orderBy('name')->get();
        $users = User::all();
        $types = Type::all();

        return view('store.edit', compact('store', 'networks', 'users', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'network_id' => 'required|integer',
            'manager_id' => 'required|integer',
            'image_url' => 'required|url'
        ]);

        $store->user_id = auth()->id();
        $store->name = $request->name;
        $store->slug = str_slug($request->name);
        $store->title = $request->title;
        $store->body = $request->body;
        $store->network_id = $request->network_id;
        $store->manager_id = $request->manager_id;
        $store->image_url = $request->image_url;
        $store->categories = $request->categories;
        $store->save();

        Offer::where('store_id', $store->id)->update(['image_url' => $request->image_url]);

        return redirect()
            ->action('StoreController@edit', ['id' => $store->id])
            ->with('status', 'Updated Store created I am so proud!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        Offer::where('store_id', $store->id)->delete();

        $store->delete();

        return redirect('store')->with('status', 'Store removed!');
    }

    public function storeOffer(Store $store, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'body' => 'required',
            'url' => 'required|url',
            'type_id' => 'required|integer',
            'store_id' => 'integer'
        ]);

        $store = Store::where('id', $request->store_id)->first();

        $offer = new Offer();
        $offer->user_id = auth()->id();
        $offer->type_id = $request->type_id;
        $offer->title = $request->title;
        $offer->url = $request->url;
        $offer->image_url = $store->image_url;
        $offer->body = $request->body;
        $offer->coupon = $request->coupon;
        $offer->store_id = $request->store_id;
        $offer->start_date =  date('Y-m-d H:i:s', strtotime($request->start_date));
        $offer->end_date = date('Y-m-d H:i:s', strtotime($request->end_date));

        $offer->save();

        if (empty($store->categories)) {
            $categories = $request->categories;
        } else {
            $categories = $store->categories;
        }

        if (!empty($categories)) {
            if (str_contains($categories, ',')) {
                $cats = explode(',', $categories);
                foreach ($cats as $cat) {
                    $cat = trim($cat);
                    if (!empty($cat)) {
                        $catIn = new Category();
                        $catIn->offer_id = $offer->id;
                        $catIn->name = $cat;
                        $catIn->save();
                    }
                }
            } else {
                $category = new Category();
                $category->offer_id = $offer->id;
                $category->name = $categories;
                $category->save();
            }
        }

        return back()->with('status', 'Offer created!');
    }
}
