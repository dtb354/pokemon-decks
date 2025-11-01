<?php

namespace App\Http\Controllers;

use App\Models\StrategyTag;
use Illuminate\Http\Request;

class StrategyTagController extends Controller
{
    public function index()
    {
        //Only allow admins
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        $tags = StrategyTag::all();
        return view('admin.strategy-tags.index', compact('tags'));
    }

    public function create()
    {
        //Only allow admins
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        return view('admin.strategy-tags.create');
    }

    public function store(Request $request)
    {
        //Only allow admins
        if (!auth()->check() || auth()->user()->is_admin != 1) {
            abort(403, 'Unauthorized access.');
        }

        $request->validate(['name' => 'required|unique:strategy_tags|max:255']);
        StrategyTag::create(['name' => $request->name]);

        return redirect()->route('admin.strategy-tags.index')->with('success', 'Tag created successfully!');
    }
}
