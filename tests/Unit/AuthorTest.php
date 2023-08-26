<?php

use App\Models\Author;
use App\Models\Story;

it('creates an author with stories and checks all DB attributes', function () {
    $author = Author::factory()
        ->has(Story::factory()->count(3))
        ->create();

    $this->assertCount(3, $author->stories);
    $this->assertNotNull($author->id);
    $this->assertNotNull($author->firstname);
    $this->assertNotNull($author->lastname);
    // Ces attributs sont optionnels, donc ils pourraient être null
    $this->assertIsString($author->website_url);
    $this->assertIsString($author->facebook_url);
    $this->assertIsString($author->instagram_url);
    $this->assertIsString($author->xcontest_url);
    $this->assertIsInt($author->paragliding_since);
    $this->assertIsString($author->picture_url);

    foreach ($author->stories as $story) {
        $this->assertNotNull($story->id);
        $this->assertNotNull($story->title);
        $this->assertNotNull($story->content);
        $this->assertEquals($author->id, $story->author_id);
    }
});
