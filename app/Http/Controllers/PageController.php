<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Blog;
use Symfony\Component\Yaml\Tests\B;

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
        if (!empty($request->search_text)) {
            $offers = Offer::search($request->search_text)->get();

            if (empty($offers)) {
                return redirect('/');
            } elseif (!empty($offers)) {
                return view('pages.results', compact('offers', 'request'));
            }
            
        } else {
            return redirect('/');
        }
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexBlog(Request $request, Blog $blog)
    {
        $blogs = $blog->unarchived()->blogFilter($request)->orderBy('updated_at', 'desc')->paginate(15);

        return view('pages.blog', compact('blogs'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewBlog($slug)
    {
        $blog = Blog::slug($slug)->first();

        return view('pages.blog-page', compact('blog'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewAbout()
    {
        return view('pages.about');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewPrivacy()
    {
        return view('pages.privacy');
    }

    public function viewTerms()
    {
        return view('pages.terms');
    }
}
