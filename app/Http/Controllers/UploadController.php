<?php

namespace App\Http\Controllers;

use App\Network;
use App\Offer;
use App\Store;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * UploadController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param Network $network
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Network $network)
    {
        $stores = Store::where('network_id', $network->id)->orderBy('name')->get();

        return view('upload.create', compact('network', 'stores'));
    }

    public function store(Network $network, Request $request)
    {
        $this->validate($request, [
            'csv_file' => 'required',
            'store_id' => 'required|integer'
        ]);

        $store = Store::where('id', $request->store_id)->first();

        $path = $request->file('csv_file')->storeAs('upload/csv', $network->name.'_'.Carbon::now().'.csv');
        $csv = array_map('str_getcsv', file('../storage/app/'.$path));

        for ($i=0; $i < sizeof($csv) ; $i++) {
            $offer = new Offer();
            $offer->user_id = auth()->id();
            $offer->type_id = 5;
            $offer->title = $csv[$i][3];
            $offer->url = $csv[$i][12];
            $offer->image_url = $store->image_url;
            $offer->body = $csv[$i][4];
            $offer->coupon = $csv[$i][14];
            $offer->store_id = $request->store_id;
            $offer->start_date = (!empty($csv[$i][15])) ? date('Y-m-d H:i:s', strtotime($csv[$i][15])) : null;
            $offer->end_date = (!empty($csv[$i][16])) ? date('Y-m-d H:i:s', strtotime($csv[$i][16])) : null;
            $offer->archive = 2;

            $offer->save();

            $categories = str_replace(' ', ',', $csv[$i][5]);

            if (!empty($categories)) {
                if (str_contains($categories, ',')) {
                    $cats = explode(',', $categories);
                    foreach ($cats as $cat) {
                        $cat = trim($cat);
                        if (!empty($cat)) {
                            Category::updateOrCreate(
                                ['offer_id' => $offer->id],
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

        }

        return redirect('/dashboard?filter=staged');
    }

}
