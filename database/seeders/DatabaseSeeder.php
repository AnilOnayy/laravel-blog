<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
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
        User::truncate();
        Category::truncate();
        Post::truncate();
        
        $user = User::factory()->create();

        $personal  = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'My Excerpt',
            'category_id' => $work->id,
            'user_id' => $user->id,
            'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi, unde officiis assumenda possimus sit aspernatur inventore, distinctio commodi error dicta dolorem ea at maiores odit enim nihil voluptatibus dignissimos quis?</p>'
        ]);
    }
}
