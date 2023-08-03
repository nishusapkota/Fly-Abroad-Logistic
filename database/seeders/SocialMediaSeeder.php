<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialMedia::create([
            'name'=>'facebook',
            'link'=>'https://www.facebook.com/',
            'status' => 0,
        ]);
        SocialMedia::create([
            'name'=>'youtube',
            'link'=>'https://www.youtube.com/',
            'status' => 0,
        ]);
        SocialMedia::create([
            'name'=>'tiktok',
            'link'=>'https://www.tiktok.com/',
            'status' => 0,
        ]);
        SocialMedia::create([
            'name'=>'linkedin',
            'link'=>'https://www.linkedin.com/',
            'status' => 0,
        ]);
        SocialMedia::create([
            'name'=>'twitter',
            'link'=>'https://twitter.com/',
            'status' => 0,
        ]);
        SocialMedia::create([
            'name'=>'instagram',
            'link'=>'https://www.instagram.com/',
            'status' => 0,
        ]);
        
    }
}
