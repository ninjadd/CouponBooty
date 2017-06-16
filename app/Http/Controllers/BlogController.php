<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;

class BlogController extends Controller
{
    /**
     * BlogController constructor.
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
    public function index(Request $request)
    {
        switch ($request->filter) {
            case 'all':
                $blogs = Blog::all();
                break;

            case 'archived':
                $blogs = Blog::archived()->get();
                break;

            case 'unarchived':
                $blogs = Blog::unarchived()->get();
                break;

            default:
                $blogs = Blog::unarchived()->get();
        }


        $all = Blog::all();
        $archived = Blog::archived()->get();
        $unarchived = Blog::unarchived()->get();

        return view('blogger.index', compact('blogs', 'all', 'archived', 'unarchived'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogger.create');
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
           'title' => 'required|unique:blogs',
           'body' => 'required'
        ]);

        $blog = new Blog();
        $blog->user_id = auth()->id();
        $blog->title = $request->title;
        $blog->title_slug = str_slug($request->title);
        $blog->body = $request->body;
        $blog->save();

        return redirect('blogger')->with('status', 'New Blog post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blogger.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogger.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request ,[
            'title' => 'required',
            'body' => 'required'
        ]);

        $blog->user_id = auth()->id();
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->save();

        return redirect('blogger')->with('status',  $blog->title.' page updated!');
    }

    public function archive(Blog $blog)
    {
        $archive = $blog->archive;

        if ($archive == 1) {
            $blog->archive = 0;
            $blog->save();
            return redirect('blogger')->with('status',  $blog->title.' page un-archived!');
        } elseif ($archive == 0) {
            $blog->archive = 1;
            $blog->save();
            return redirect('blogger')->with('status',  $blog->title.' page archived!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect('blogger')->with('status',  $blog->title.' page deleted!');
    }
}
