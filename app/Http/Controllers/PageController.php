<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Blog;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome()
    {
        $offers = Offer::paginate(12);

        return view('pages.welcome', compact('offers'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function results(Request $request)
    {
        $offers = Offer::search($request->search_text)->get();


        return view('pages.results', compact('offers', 'request'));
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexBlog(Blog $blog)
    {
        $blogs = $blog->unarchived()->orderBy('updated_at', 'desc')->get();

        return view('pages.blog', compact('blogs'));
    }

    public function viewBlog($slug)
    {
        $blog = Blog::slug($slug)->first();

        return view('pages.blog-page', compact('blog'));
    }
}
