<?php

namespace App\Http\Controllers;

use App\Models\Story;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::all();

        return view('stories.index', ['stories' => $stories]);
    }

    public function show($id)
    {
        $story = Story::findOrFail($id);

        return view('stories.show', ['story' => $story]);
    }
}
