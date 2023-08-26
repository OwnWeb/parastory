<?php

use App\Models\Author;
use App\Models\Story;

it('creates a story with all DB attributes', function () {
    $story = Story::factory()
        ->forAuthor()
        ->create();

    // Check that the story has an associated author
    $this->assertNotNull($story->author);
    $this->assertNotNull($story->author_id);

    // Check all story attributes
    $this->assertNotNull($story->id);
    $this->assertNotNull($story->title);
    $this->assertIsString($story->subtitle);  // nullable
    $this->assertNotNull($story->content);
    $this->assertNotNull($story->date);
    $this->assertIsString($story->source_url);  // nullable
    $this->assertIsString($story->track_url);  // nullable
    $this->assertNotNull($story->default_locale);
    $this->assertIsArray($story->images);  // nullable

    // Check the associated author's attributes
    $this->assertNotNull($story->author->id);
    $this->assertNotNull($story->author->firstname);
    $this->assertNotNull($story->author->lastname);
    $this->assertIsString($story->author->website_url);
    $this->assertIsString($story->author->facebook_url);
    $this->assertIsString($story->author->instagram_url);
    $this->assertIsString($story->author->xcontest_url);
    $this->assertIsInt($story->author->paragliding_since);
    $this->assertIsString($story->author->picture_url);
});
