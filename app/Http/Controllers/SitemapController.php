<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Store;
use App\Type;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        $types = Type::all();
        $blogs = Blog::all();

        return response()->view('sitemap.index', compact('stores', 'types', 'blogs'))->header('Content-Type', 'text/xml');
    }
}
