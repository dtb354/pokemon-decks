<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        // Only allow admins
        if (!Auth::check() || Auth::user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        // Get all posts, including the author
        $posts = Post::with('user')->latest()->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'name' => $request->name,
            'text' => $request->text,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        $post = Post::findOrFail($id);

        if ($post->image) {
            Storage::delete('public/' . $post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }

    public function toggleActive($id)
    {
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        $post = Post::findOrFail($id);
        $post->is_active = !$post->is_active; // flip true/false
        $post->save();

        $status = $post->is_active ? 'activated' : 'deactivated';
        return redirect()->route('admin.posts.index')->with('success', "Post has been {$status}.");
    }
}

