<?php

namespace App\Console\Commands;

use App\Models\Story;
use Carbon\CarbonImmutable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportFBStories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-fb-stories {file} {author_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = $this->argument('file');
        $author_id = $this->argument('author_id');

        // Lecture depuis un fichier local
    if (file_exists($file)) {
        $json = file_get_contents($file);
    } else {
        $this->error("Fichier introuvable");
        return;
    }
        $stories = json_decode($json, true);

        foreach ($stories as $storyData) {
            $images = [];

            if (!empty($storyData['media'])) {
                foreach ($storyData['media'] as $media) {
                    if (!empty($media['__isMedia']) && $media['__isMedia'] === 'Photo') {
                        $url = !empty($media['photo_image']) ? $media['photo_image']['uri'] : $media['thumbnail'];

                        $parsedUrl = parse_url($url);
                        $fileName = pathinfo($parsedUrl['path'], PATHINFO_FILENAME);

                        $imagePath = 'public/stories/' . $fileName;
                        $images[] = $imagePath;

                        if (!Storage::exists($imagePath)) {
                            Storage::put($imagePath, file_get_contents($url));
                        }
                    }
                }

                ray($images);
            }

            $title = strtok($storyData['text'], "\n");
            Story::factory()->create([
                'title' => $title,
                'content' => $storyData['text'],
                'author_id' => $author_id,
                'source_url' => $storyData['url'],
                'subtitle' => null,
                'images' => $images,
                'date' => CarbonImmutable::parse($storyData['time'])
            ]);

            $this->info("Imported $title");
        }
    }
}
