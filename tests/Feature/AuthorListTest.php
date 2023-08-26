<?php

use App\Models\Author;

use function Pest\Laravel\get;

it('can fetch a list of authors', function () {
    Author::factory()->count(5)->create();

    $response = get(route('authors.index'));

    $response->assertStatus(200);
    $response->assertViewHas('authors');
});
