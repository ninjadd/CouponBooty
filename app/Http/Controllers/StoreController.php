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
            'network_id' => 'required|array',
            'manager_id' => 'required|integer',
            'image_url' => 'required|url'
        ]);

        $store = new Store();
        $store->user_id = auth()->id();
        $store->name = $request->name;
        $store->slug = str_slug($request->name);
        $store->title = $request->title;
        $store->body = $request->body;
        $store->network_id = json_encode($request->network_id);
        $store->manager_id = $request->manager_id;
        $store->image_url = $request->image_url;
        $store->categories = $request->categories;
        $store->url  = $request->url;
        $store->save();

        Offer::where('store_id', $store->id)->update(['image_url' => $request->image_url]);

        return redirect('dashboard')->with('status', 'New Store created I am so proud!');
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
            'network_id' => 'required|array',
            'manager_id' => 'required|integer',
            'image_url' => 'required|url'
        ]);

        $store->user_id = auth()->id();
        $store->name = $request->name;
        $store->slug = str_slug($request->name);
        $store->title = $request->title;
        $store->body = $request->body;
        $store->network_id = json_encode($request->network_id);
        $store->manager_id = $request->manager_id;
        $store->image_url = $request->image_url;
        $store->categories = $request->categories;
        $store->url = $request->url;
        $store->save();

        Offer::where('store_id', $store->id)->update(['image_url' => $request->image_url]);

        return redirect()
            ->action('StoreController@edit', ['id' => $store->id])
            ->with('status', 'Updated Store created I am so proud!');
    }

    /**
     * @param Store $store
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Store $store)
    {
        Offer::where('store_id', $store->id)->delete();

        $store->delete();

        return redirect('dashboard')->with('status', 'Store removed!');
    }

    /**
     * @param Store $store
     * @return \Illuminate\Http\RedirectResponse
     */
    public function archive(Store $store)
    {
        $archive = $store->archive;

        if ($archive == 0) {
            $store->archive = 1;
            $store->save();
            return back()->with('status', 'Store archived!');
        } else {
            $store->archive = 0;
            $store->save();
            return back()->with('status', 'Store unarchived!');
        }
    }
}
