<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{



    public function run()
    {


        Storage::deleteDirectory('public/posts');
        Storage::makeDirectory('public/posts');

        $this->call(RolSeeder::class);

        $this->call(UserSeeder::class);
        Category::factory(5)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);

        
    }
}
