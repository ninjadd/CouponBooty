<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Offer;
use App\Blog;
use App\BlogComment;
use App\Contact;
use App\Message;
use App\Category;
use App\Type;
use App\Store;
use App\Mail\ContactUs;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome()
    {
        $offers = Offer::where('archive', 0)->orderBy('updated_at', 'desc')->paginate(20);
        $types = Type::all();
        $end_offers = Offer::where('archive', 0)->whereNotNull('end_date')->orderBy('end_date')->take(12)->get();

        return view('pages.welcome', compact('offers', 'types', 'end_offers'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function results(Request $request)
    {
        if (!empty($request->search_text)) {
            $categories = Category::where('name', 'like', $request->search_text)->pluck('offer_id')->unique();
            $offers = Offer::where('archive', 0)
                ->whereIn('id', $categories)
                ->orWhere('title', 'like', $request->search_text)
                ->orWhere('body', 'like', $request->search_text)
                ->get();
            return view('pages.results', compact('offers', 'request'));
        } else {
            return redirect('/');
        }
    }

    public function viewSlug($slug)
    {
        // check stores first
        $store = Store::slug($slug)->first();
        if ($store->count() > 0) {
            $offers = Offer::where([
                ['store_id', $store->id],
                ['archive', 0]
            ])
                ->orderBy('updated_at', 'desc')
                ->get();

            return view('pages.store-slug', compact('store', 'offers'));
        }

        return redirect('/');
    }

    public function viewType($slug)
    {
        $slug = urldecode($slug);

        $type = Type::where('label', $slug)->first();
        if ($type)
        {

            $offers = Offer::where([
                ['type_id', $type->id],
                ['archive', 0]
            ])->get();

            return view('pages.type-slug', compact('type', 'offers'));
        }
        return redirect('/');
    }

    public function viewStores()
    {
        $initials = Store::selectRaw('DISTINCT SUBSTRING(name,1,1) as initial')->orderBy('initial')->get();
        foreach ($initials as $initial) {
            $initial_stores[$initial->initial] = Store::where('name', 'like', $initial->initial.'%')->get()->toArray();
        }

        return view('pages.stores', compact( 'initial_stores'));
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
     * @param Request $request
     * @param Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insertComment(Request $request, Blog $blog)
    {
        $this->validate($request, [
           'body' => 'required'
        ]);

        $blogComment = new BlogComment();

        $blogComment->blog_id = $blog->id;
        $blogComment->body = $request->body;
        $blogComment->save();

        return back();
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewTerms()
    {
        return view('pages.terms');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMessage(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'email' => 'required|email',
           'body' => 'required'
        ]);

        $contact = Contact::updateOrCreate([
           'name' => $request->name,
           'email' => $request->email
        ]);

        $message = new Message();
        $message->contact_id = $contact->id;
        $message->body = $request->body;
        $message->save();

        Mail::to('contact@couponbooty.com')->send(new ContactUs($message));

        return back()->with('message', 'You message has been sent');
    }
}
