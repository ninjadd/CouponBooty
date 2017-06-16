<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quad;

class QuadController extends Controller
{
    /**
     * QuadController constructor.
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
    public function index()
    {
        $quads = Quad::all();

        return view('quad.index', compact('quads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quad.create');
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
            'title' => 'required|unique:quads',
            'body' => 'required'
        ]);

        $quad = new Quad();
        $quad->user_id = auth()->id();
        $quad->title = $request->title;
        $quad->body = $request->body;
        $quad->save();

        return redirect('quad')->with('status', 'New SOP whoop there it is!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quad  $quad
     * @return \Illuminate\Http\Response
     */
    public function show(Quad $quad)
    {
        return view('quad.show', compact('quad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quad  $quad
     * @return \Illuminate\Http\Response
     */
    public function edit(Quad $quad)
    {
        return view('quad.edit', compact('quad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quad  $quad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quad $quad)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $quad->user_id = auth()->id();
        $quad->title = $request->title;
        $quad->body = $request->body;
        $quad->save();

        return redirect('quad')->with('status', 'Updated SOP you are the greatest human in the world!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quad  $quad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quad $quad)
    {
        $quad->delete();

        return redirect('quad')->with('status', 'I know it\'s sad but that lazy SOP had to go!');
    }
}
