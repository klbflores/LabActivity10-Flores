<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::all();
        $kagawad = Author::where('email', 'kagawad.flores@bulletin.test')->first();

        // 40 published posts
        Post::factory()->count(40)
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        // 10 drafts
        Post::factory()->count(10)->draft()
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        // 1 pinned post
        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Flores Clean-up Drive',
            'category' => 'Announcement',
            'body' => 'Join the Purok Flores community clean-up drive this weekend. Please bring cleaning materials, brooms, and trash bags. Refreshments will be served.',
            'views' => 25,
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-02-04 08:00:00',
        ]);
    }
}