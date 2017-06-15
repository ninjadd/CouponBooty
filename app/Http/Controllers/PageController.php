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
use App\Mail\ContactUs;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome()
    {
        $offers = Offer::orderBy('updated_at', 'desc')->paginate(20);

        return view('pages.welcome', compact('offers'));
    }

    public function splash()
    {
        $offers = Offer::orderBy('updated_at', 'desc')->paginate(12);
        $categories = Category::distinct('name')->get();
        $types = Type::all();

        return view('pages.splash', compact('offers', 'categories', 'types'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function results(Request $request)
    {
        if (!empty($request->search_text)) {
            $offers = Offer::search($request->search_text)->get();

            if ($offers->count() == 0) {
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
