<?php

namespace App\Http\Controllers;

use App\Models\TypeTag;
use Illuminate\Http\Request;

class TypeTagController extends Controller
{
    public function index()
    {
        //Only allow admins
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        $tags = TypeTag::all();
        return view('admin.type-tags.index', compact('tags'));
    }

    public function create()
    {
        //Only allow admins
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        return view('admin.type-tags.create');
    }

    public function store(Request $request)
    {
        //Only allow admins
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate(['name' => 'required|unique:type_tags|max:255']);
        TypeTag::create(['name' => $request->name]);

        return redirect()->route('admin.type-tags.index')->with('success', 'Tag created successfully!');
    }

}
