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

        $nextStory = Story::where('id', '>', $story->id)->first();
        $prevStory = Story::where('id', '<', $story->id)->orderBy('id', 'DESC')->first();

        return view('stories.show', ['story' => $story, 'nextStory' => $nextStory, 'prevStory' => $prevStory]);
    }
}
