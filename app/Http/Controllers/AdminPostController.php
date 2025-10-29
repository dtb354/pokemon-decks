<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index(Request $request)
    {
        //Only allow admins
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        // Get filter value from query string (default: 'all')
        $filter = $request->query('filter', 'all');

        // Base query
        $query = Post::with('user')->latest();

        // Apply filter if needed
        if ($filter === 'active') {
            $query->where('is_active', true);
        } elseif ($filter === 'inactive') {
            $query->where('is_active', false);
        }

        // Fetch posts
        $posts = $query->paginate(10);

        return view('admin.posts.index', compact('posts', 'filter'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
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

