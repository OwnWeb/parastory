<?php

use App\Models\Author;
use App\Models\Story;

it('displays story page correctly', function () {
    // Créer un auteur et une histoire
    $author = Author::factory()->create();
    $story = Story::factory()->create(['author_id' => $author->id]);

    // Visiter la page de l'histoire
    $response = $this->get('/stories/' . $story->id);

    // Vérifier que la page se charge correctement
    $response->assertStatus(200);

    // Vérifier que les données s'affichent
    $response->assertSeeText($story->title);
    $response->assertSeeText($story->author->name);
    $response->assertSeeText($story->date);
    $response->assertSeeText($story->subtitle);
    $response->assertSeeText($story->source_url);
});
