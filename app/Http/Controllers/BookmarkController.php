<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Post;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index() {
        return view('bookmarks.index',[
            'bookmarks' => Bookmark::all()
        ]);
    }
    public function store()
    {
        $attributes = array_merge(request()->validate([
            'post_id' => 'exists:posts,id'
        ]),[
            'user_id' => auth()->user()->id
        ]);

        Bookmark::create($attributes);

        return back()->with('success', 'Post added to bookmarks by successfully');
    }

    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();

        return back()->with('success', 'Post removed from bookmarks by successfully');
    }
}
