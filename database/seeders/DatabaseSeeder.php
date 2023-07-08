<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::factory(10)->create();
        $tags = Tag::factory(40)->create();
        $posts = Post::factory(80)->create();

        foreach($posts as $post)
        {
            $tagIds = $tags->random(5)->pluck('id');
            $post->tags()->withTimestamps()->attach($tagIds);
        }

    }
}
