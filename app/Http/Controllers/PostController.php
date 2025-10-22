<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all posts
        $posts = Post::all();
        //dd($posts);

         //Fetch the first post
        $firstPost = Post::first();

         //Send both to the view
        return view('posts.index', compact('posts'), compact('firstPost'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'name'=>['required', 'string', 'max:255'],
            'text'=>['required', 'string', 'max:255'],
            'type'=>['required', 'integer'],
            'strategy'=>['required', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        $post = new Post();
        $post -> user_id = 1;
        $post -> name = $request->input('name');
        $post -> text = $request->input('text');
        $post -> type_tag_id = $request->input('type');
        $post -> strategy_tag_id = $request->input('strategy');

        // If a new image was uploaded, store it
        $nameOfFile = $request->file('image')->storePublicly('posts', 'public');
        $post->image = $nameOfFile; //to store the link to the image in the DB

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        //
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        //

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string', 'max:255'],
            'type' => ['required', 'integer'],
            'strategy' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        $post = Post::findOrFail($id);

        // Prepare the data to update
        $data = [
            'name' => $request->name,
            'text' => $request->text,
            'type_tag_id' => $request->type,
            'strategy_tag_id' => $request->strategy,
        ];

        // If a new image was uploaded, store it
        $nameOfFile = $request->file('image')->storePublicly('posts', 'public');
        $post->image = $nameOfFile; //to store the link to the image in the DB

        // Update the post with all the data
        $post->update($data);

        return redirect()->route('posts.show', $post->id)
            ->with('success', 'Post updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
