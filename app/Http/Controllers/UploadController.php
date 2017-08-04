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

    public function store(Request $request)
    {
        $this->validate($request, [
            'csv_file' => 'required',
            'store_id' => 'required|integer'
        ]);

        $store = Store::where('id', $request->store_id)->first();
        $network_id = $store->network_id;
        ini_set('auto_detect_line_endings', true);
        $csv = array_map('str_getcsv', file($request->file('csv_file')));

        if ($network_id == 1) {
            for ($i=0; $i < sizeof($csv) ; $i++) {
                $offer = new Offer();
                $offer->user_id = auth()->id();
                $offer->type_id = 5;
                $offer->title = utf8_encode($csv[$i][3]);
                $offer->url = utf8_encode($csv[$i][12]);
                $offer->image_url = $store->image_url;
                $offer->body = utf8_encode($csv[$i][4]);
                $offer->coupon = utf8_encode($csv[$i][14]);
                $offer->store_id = $request->store_id;
                $offer->start_date = (!empty($csv[$i][15])) ? date('Y-m-d H:i:s', strtotime($csv[$i][15])) : null;
                $offer->end_date = (!empty($csv[$i][16])) ? date('Y-m-d H:i:s', strtotime($csv[$i][16])) : null;
                $offer->archive = 2;

                $offer->save();

                $categories = $store->categories;

                if (!empty($categories)) {
                    if (str_contains($categories, ',')) {
                        $cats = explode(',', $categories);
                        foreach ($cats as $cat) {
                            $cat = trim($cat);
                            if (!empty($cat)) {
                                $storeCategory = new Category();
                                $storeCategory->offer_id = $offer->id;
                                $storeCategory->name = $cat;
                                $storeCategory->save();
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
        }

        if ($network_id == 3) {
            for ($i=0; $i < sizeof($csv) ; $i++) {
                preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $csv[$i][0], $links);
                if (!empty($links[0][0])) {
                    $url = $links[0][0];
                    $body = strip_tags($csv[$i][0]);
                    (!empty($csv[$i][3])) ? $title = $csv[$i][3] : $title = null;

                    $offer = new Offer();
                    $offer->user_id = auth()->id();
                    $offer->type_id = 5;
                    $offer->title = utf8_encode($title);
                    $offer->url = utf8_encode($url);
                    $offer->image_url = $store->image_url;
                    $offer->body = utf8_encode($body);
                    $offer->store_id = $request->store_id;
                    $offer->start_date = (!empty($csv[$i][4])) ? date('Y-m-d H:i:s', strtotime($csv[$i][4])) : null;
                    $offer->end_date = (!empty($csv[$i][5])) ? date('Y-m-d H:i:s', strtotime($csv[$i][5])) : null;
                    $offer->archive = 2;

                    $offer->save();

                    $categories = $store->categories;

                    if (!empty($categories)) {
                        if (str_contains($categories, ',')) {
                            $cats = explode(',', $categories);
                            foreach ($cats as $cat) {
                                $cat = trim($cat);
                                if (!empty($cat)) {
                                    $storeCategory = new Category();
                                    $storeCategory->offer_id = $offer->id;
                                    $storeCategory->name = $cat;
                                    $storeCategory->save();
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
            }
        }

        return redirect('/offer?filter=staged');
    }

}
