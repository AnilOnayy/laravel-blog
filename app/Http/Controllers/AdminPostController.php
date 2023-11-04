<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index() {
        return view('admin.posts.index',[
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
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

    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {

        $attributes = request()->validate([
            'title' => 'required|min:3|max:40',
            'slug' => ['required',Rule::unique('posts','slug')->ignore($post->id)],
            'excerpt' => 'required|min:3|max:200',
            'body' => 'required|min:3',
            'category_id' => 'required|exists:categories,id'
        ]);

        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated');
    }
}
