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

    public function create()
    {
        return view('posts.create',[
            'categories' => Category::all()
        ]);
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => 'required|min:3|max:40',
            'slug' => 'required|unique:posts,slug',
            'excerpt' => 'required|min:3|max:200',
            'body' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'required|image'
        ]);


        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['user_id'] = auth()->user()->id;

        $post = Post::create($attributes);

        return redirect("/posts/{$post->slug}")->with('success','Post created by successfully');
    }

}
