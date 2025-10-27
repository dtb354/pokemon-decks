<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::with(['user', 'strategyTag', 'typeTag'])
            ->where('is_active', true);

        // Filters
        if ($request->filled('type_tag')) {
            $query->where('type_tag_id', $request->type_tag);
        }

        if ($request->filled('strategy_tag')) {
            $query->where('strategy_tag_id', $request->strategy_tag);
        }

        if ($request->filled('active')) {
            $query->where('is_active', $request->active);
        }

        $posts = $query->get();

        // Pick a random featured post from the active ones
        $activePosts = $posts->where('is_active', true);
        $firstPost = $activePosts->isNotEmpty() ? $activePosts->random() : null;


        // Fetch all tags for filters
        $typeTags = \App\Models\TypeTag::all();
        $strategyTags = \App\Models\StrategyTag::all();

        return view('posts.index', compact('posts', 'firstPost', 'typeTags', 'strategyTags'));
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
            'name' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string', 'max:255'],
            'type' => ['required', 'integer'],
            'strategy' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->name = $request->input('name');
        $post->text = $request->input('text');
        $post->type_tag_id = $request->input('type');
        $post->strategy_tag_id = $request->input('strategy');
        $post->is_active = false;

        // Only store the image if one was uploaded
        if ($request->hasFile('image')) {
            $nameOfFile = $request->file('image')->storePublicly('posts', 'public');
            $post->image = $nameOfFile;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
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

        // Authorization check
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        // Authorization check
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validate inputs
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string', 'max:255'],
            'type' => ['required', 'integer'],
            'strategy' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        // Update the post fields (same structure as your store method)
        $post->name = $request->input('name');
        $post->text = $request->input('text');
        $post->type_tag_id = $request->input('type');
        $post->strategy_tag_id = $request->input('strategy');

        // If a new image was uploaded, store it (same logic as store())
        if ($request->hasFile('image')) {
            $nameOfFile = $request->file('image')->storePublicly('posts', 'public');
            $post->image = $nameOfFile; // store link to the image in DB
        }

        // Save updated post
        $post->save();

        return redirect()->route('posts.show', $post->id)
            ->with('success', 'Post updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        // Authorization: only owner can delete
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Optional: delete the image file too
        if ($post->image && \Storage::disk('public')->exists($post->image)) {
            \Storage::disk('public')->delete($post->image);
        }

        // Delete the post from the database
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
