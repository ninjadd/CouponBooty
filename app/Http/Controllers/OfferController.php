<?php

namespace App\Http\Controllers;

use App\Network;
use App\Offer;
use App\Type;
use App\Category;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;


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
        $stores = Store::all();
        $networks = Network::orderBy('name')->get();

        return view('offer.create', compact('types', 'stores', 'networks'));
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
        $offer->start_date =  (!empty($request->start_date)) ? date('Y-m-d H:i:s', strtotime($request->start_date)) : $request->start_date;
        $offer->end_date =  (!empty($request->end_date)) ? date('Y-m-d H:i:s', strtotime($request->end_date)) : $request->end_date;
        $offer->archive = $request->archive;

        $offer->save();
        
        $categories = $request->categories;

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
         return view('offer.show', compact('offer'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param Offer $offer
     * @param Type $type
     * @param Store $store
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Offer $offer)
    {
        $types = Type::all();
        $categories = Category::byOffer($offer->id)->get();
        $stores = Store::all();

        return view('offer.edit', compact('offer', 'types', 'categories', 'stores'));
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
            'title' => 'required|max:50',
            'body' => 'required',
            'url' => 'required|url',
            'type_id' => 'required|integer',
            'store_id' => 'integer'
        ]);

        $store = Store::where('id', $request->store_id)->first();

        $offer->user_id = auth()->id();
        $offer->type_id = $request->type_id;
        $offer->title = $request->title;
        $offer->url = $request->url;
        $offer->image_url = $store->image_url;
        $offer->body = $request->body;
        $offer->coupon = $request->coupon;
        $offer->store_id = $request->store_id;
        $offer->start_date =  (!empty($request->start_date)) ? date('Y-m-d H:i:s', strtotime($request->start_date)) : $request->start_date;
        $offer->end_date =  (!empty($request->end_date)) ? date('Y-m-d H:i:s', strtotime($request->end_date)) : $request->end_date;
        $offer->archive = $request->archive;

        $offer->save();

        $categories = $request->categories;

        if (!empty($categories)) {
            Category::where('offer_id', $offer->id)->delete();
            if (str_contains($categories, ',')) {
                $cats = explode(',', $categories);
                foreach ($cats as $cat) {
                    $cat = trim($cat);
                    if (!empty($cat)) {
                        Category::updateOrCreate(
                            ['offer_id' => $offer->id, 'name' => $cat],
                            ['name' => $cat]
                        );
                    }
                }
            } else {
                $category = new Category();
                $category->offer_id = $offer->id;
                $category->name = $categories;
                $category->save();
            }
        }

        if (empty($request->offer_ids)) {
            return redirect()
                ->action('StoreController@edit', ['id' => $store->id])
                ->with('status', 'Offer #'. $offer->id . ' updated!');
        } elseif (!empty($request->offer_ids)) {
            return (new OfferController())->bulk($request)->with('status', 'Offer #'. $offer->id . ' updated!');
        }
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
            return back()->with('status', 'Offer #'. $offer->id . ' archived!');
        } else {
            $offer->archive = 0;
            $offer->save();
            return back()->with('status', 'Offer #'. $offer->id . ' live!');
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

        return back()->with('status', 'Offer #'. $offer->id . ' deleted!');
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

    public function bulk(Request $request) {
        $this->validate($request, [
           'action_item' => 'required',
           'offer_ids' => 'required'
        ]);

        $action_item = $request->action_item;
        $offer_ids = $request->offer_ids;
        
        switch ($action_item) {
            case 'Live':
                Offer::whereIn('id', $offer_ids)->update(['archive' => 0]);
                return back()->with('status', count($offer_ids) . ' Offers live!');
                break;

            case 'Archive':
                Offer::whereIn('id', $offer_ids)->update(['archive' => 1]);
                return back()->with('status', count($offer_ids) . ' Offers archived!');
                break;

            case 'Stage':
                Offer::whereIn('id', $offer_ids)->update(['archive' => 2]);
                return back()->with('status', count($offer_ids) . ' Offers staged!');
                break;

            case 'Edit':
                $offers = Offer::whereIn('id', $offer_ids)->get();
                $types = Type::all();
                $stores = Store::all();
                return view('offer.bulk', compact('offers', 'offer_ids', 'types', 'stores'));
                break;

            case 'Delete':
                Offer::destroy($offer_ids);
                return back()->with('status', count($offer_ids) . ' Offers DELETED!');
                break;

        }
    }
}
