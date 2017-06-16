<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Type;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
            'title' => 'required',
            'body' => 'required',
            'url' => 'required|url',
            'image_url' => 'required|url',
            'type_id' => 'required|integer'
        ]);

        $offer = new Offer();
        $offer->user_id = auth()->id();
        $offer->type_id = $request->type_id;
        $offer->title = $request->title;
        $offer->url = $request->url;
        $offer->image_url = $request->image_url;
        $offer->body = $request->body;
        $offer->coupon = $request->coupon;

        $offer->start_date = $request->start_date;
        $offer->end_date = $request->end_date;

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
            'url' => 'required|url',
            'image_url' => 'required|url',
            'type_id' => 'required|integer'
        ]);

        $offer->user_id = auth()->id();
        $offer->type_id = $request->type_id;
        $offer->title = $request->title;
        $offer->url = $request->url;
        $offer->image_url = $request->image_url;
        $offer->body = $request->body;
        $offer->coupon = $request->coupon;


        $offer->start_date = $request->start_date;
        $offer->end_date = $request->end_date;

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

    public function download()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=OfferDownload.csv');

        $output = fopen('php://output', 'w');

        fputcsv($output, ['id', 'created_by', 'type', 'title', 'url', 'image_url', 'body', 'coupon', 'start_date', 'end_date']);


        $offers = Offer::archive(0)->get();

        foreach ($offers as $offer) {

            $data = [
                $offer->id,
                $offer->user->name,
                $offer->type->label,
                $offer->title,
                $offer->url,
                $offer->image_url,
                $offer->body,
                $offer->coupon,
                $offer->start_date,
                $offer->end_date
            ];

            fputcsv($output, $data);
        }
        fclose($output);
    }
}
