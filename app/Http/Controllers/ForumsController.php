<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $forums=Forum::latest()->paginate(4);
       $forums=Forum::with(['replies','posts'])->paginate(3);
       //esta segunda es la magia  tenemos que traer los forums y los post  posts es por la relacion
       //como en la relacion del modelo los pones 
       //return $this->hasManyThrough(Reply::class, Post::class);
        
        return view('forums.index',compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd(request()->all());
        $this->validate(request(), [
            'name' => 'required|max:100|unique:forums',
            'description' => 'required|max:500',
        ]);
        Forum::create(request()->all());
	    return back()->with('message', ['success', __("Foro creado correctamente")]);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        $posts=$forum->posts()->with(['owner'])->paginate(2);
        //un foro tiene relacion con un posts y a su vez un post tiene relacion con un owner
        //el foro entra al post y a su vez al owner

        return view('forums.detail',compact('forum','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        //
    }
}
