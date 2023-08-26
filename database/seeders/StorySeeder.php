<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Story;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Trouver Maxime Pinot
        $author = Author::where('firstname', 'Maxime')
            ->where('lastname', 'Pinot')
            ->first();

        // Charger le fichier JSON
        $json = Storage::disk('local')->get('pinot.json');
        $stories = json_decode($json, true);

        // Créer les histoires avec la factory
        foreach ($stories as $storyData) {
            Story::factory()->create([
                'title' => $storyData['title'],
                'content' => $storyData['content'],
                'author_id' => $author->id,
            ]);
        }
    }
}
