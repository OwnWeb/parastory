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
        Author::create([
            'firstname' => 'Mathilde',
            'lastname' => 'Chivet',
            'website_url' => null,
            'facebook_url' => 'https://www.facebook.com/mathilde.chyvais',
            'instagram_url' => 'https://www.instagram.com/flyin_matmute/?hl=fr',
            'xcontest_url' => 'https://www.xcontest.org/2019/world/fr/pilotes/details:Flyin_Matmute',
            'paragliding_since' => null,
            'picture_url' => 'https://media.licdn.com/dms/image/C4D03AQFrlaKUkDDssQ/profile-displayphoto-shrink_400_400/0/1612875882647?e=1698883200&v=beta&t=NIzMyABo_fAsVc3PEHCsoAwrHGzh2eras9SugZSSzsg',
        ]);
    }
}
