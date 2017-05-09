<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Type;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OfferController extends Controller
{

    /**
     * OfferController constructor.
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
        $offers = Offer::orderBy('created_at', 'desc')->get();

        return view('offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view('offer.create', compact('types'));
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
            'title' => 'required|unique:offers',
            'body' => 'required',
            'type_id' => 'required|integer'
        ]);

        $offer = new Offer();
        $offer->title = $request->title;
        $offer->body = $request->body;
        $offer->type_id = $request->type_id;
        $offer->user_id = Auth::user()->id;

        $offer->save();

        if (!empty($request->categories)) {
            $categories = $request->categories;
            if (str_contains($categories, ',')) {
                $cats = explode(',', $categories);
                foreach ($cats as $cat) {
                    $cat = trim($cat);
                    if (!empty($cat)) {
                        $category = new Category();
                        $category->offer_id = $offer->id;
                        $category->name = $cat;
                        $category->save();
                    }
                }
            } else {
                $category = new Category();
                $category->offer_id = $offer->id;
                $category->name = $categories;
                $category->save();
            }
        }

        return redirect('dashboard')->with('status', 'Offer created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        // handled by modal
        // return view('offer.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer, Type $type)
    {
        $types = $type->all();
        $categories = Category::byOffer($offer->id)->get();

        return view('offer.edit', compact('offer', 'types', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'type_id' => 'required|integer'
        ]);

        $offer->update([
            'title' => $request->title,
            'body' => $request->body,
            'type_id' => $request->type_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect('dashboard')->with('status', 'Offer #'. $offer->id . ' updated!');
    }


    /**
     * @param Offer $offer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function archive(Offer $offer)
    {
        $archive = $offer->archive;

        if ($archive == 0) {
            $offer->archive = 1;
            $offer->save();
            return redirect('dashboard')->with('status', 'Offer #'. $offer->id . ' archived!');
        } elseif ($archive == 1) {
            $offer->archive = 0;
            $offer->save();
            return redirect('dashboard')->with('status', 'Offer #'. $offer->id . ' un-archived!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect('dashboard')->with('status', 'Offer #'. $offer->id . ' deleted!');
    }
}
