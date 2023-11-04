<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            // 'posts' => Post::all() // Requesting every category
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString(), // 1 request for all categories. Better Performance

        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' =>  $post
        ]);
    }
}
