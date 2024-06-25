<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class ActionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("add", [
            "posts" => Post::where('author_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add/create', [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        $validateData["author_id"] = auth()->user()->id;
        $validateData["body"] = $request->body;

        Post::create($validateData);

        return redirect('/add')->with('success', 'Post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        return view("/show", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('add.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'category_id' => 'required',
        'body' => 'required',
    ]);

    $post = Post::findOrFail($id); 
    $validateData["body"] = strip_tags($request->body);
    $post->update($validatedData);

    return redirect('/add')->with('success', 'Post telah diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('/add')->with('success', 'Post Telah Dihapus');
    }
}
