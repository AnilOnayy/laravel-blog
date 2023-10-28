<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::query()->delete();
        Post::query()->delete();
        Comment::query()->delete();
        User::query()->delete();

        $user = User::factory()->create();

        Post::factory(20)->create([
            'user_id' => $user->id
        ]);

        Comment::factory(20)->create([
            'user_id' => $user->id
        ]);
    }
}
