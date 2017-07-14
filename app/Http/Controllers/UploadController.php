<?php

namespace App\Http\Controllers;

use App\Network;
use App\Store;
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
        return view('upload.create', compact('network'));
    }

    public function store(Network $network, Request $request)
    {
        $this->validate($request, [
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        $path = $request->file('csv_file')->store('upload/csv/'.$network->name);

        return $path;

//        if (($handle = fopen($request->csv_file, "r")) !== false) {
//            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//                $output[] = $data;
//            }
//        }
//
//        return $output;
    }

}
