<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'firstname' => 'Maxime',
            'lastname' => 'Pinot',
            'website_url' => 'https://maxime-pinot.com',
            'facebook_url' => 'https://www.facebook.com/maxmixpinot/',
            'instagram_url' => 'https://www.instagram.com/max_pinot/?hl=fr',
            'xcontest_url' => 'https://www.xcontest.org/world/fr/pilotes/details:MaxP',
            'paragliding_since' => '2006',
            'picture_url' => 'https://maxime-pinot.com/wp-content/uploads/2019/10/1.png',
        ]);
    }
}
