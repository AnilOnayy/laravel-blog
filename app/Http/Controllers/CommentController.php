<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $attributes  = request()->validate([
            'body' => ['required','min:3','max:255']
        ]);

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' =>  $attributes['body']
        ]);

         return back()->with('success','Your message added successfully');
    }

    public function destroy(Post $post,Comment $comment)
    {
        $comment->delete();

        return back()->with('success','Your message deleted successfully');
    }
}
