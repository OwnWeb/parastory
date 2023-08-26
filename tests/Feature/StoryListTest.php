<?php

use App\Models\Story;

use function Pest\Laravel\get;

it('can fetch a list of stories', function () {
    Story::factory()->count(5)->create();

    $response = get(route('stories.index'));

    $response->assertStatus(200);
    $response->assertViewHas('stories');
});
