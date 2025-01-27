<?php

namespace App\Console\Commands;

use App\Models\Story;
use Illuminate\Console\Command;

class DeleteAuthorStories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-author-stories {author_id}';

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
        $author_id = $this->argument('author_id');

        Story::where('author_id', $author_id)->delete();
    }
}
