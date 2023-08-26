<?php

use App\Models\Author;

use function Pest\Laravel\get;

it('can fetch a single author', function () {
    $author = Author::factory()->create();

    $response = get(route('authors.show', $author->id));

    $response->assertStatus(200);
    $response->assertViewHas('author');
});
