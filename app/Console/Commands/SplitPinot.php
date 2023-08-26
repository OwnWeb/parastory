<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class SplitPinot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:split-pinot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(Filesystem $filesystem)
    {
        $filePath = storage_path('app/pinot.txt'); // Remplace 'ton_fichier.txt'

        if (! $filesystem->exists($filePath)) {
            $this->error('Fichier non trouvé.');

            return;
        }

        $text = $filesystem->get($filePath);
        $sections = explode('-----------------------', $text);
        $result = [];

        foreach ($sections as $section) {
            $lines = explode("\n", trim($section));
            $title = array_shift($lines);
            $content = implode("\n\n", $lines);

            $result[] = ['title' => $title, 'content' => $content];
        }

        $jsonData = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $filesystem->put(storage_path('app/pinot.json'), $jsonData);

    }
}
