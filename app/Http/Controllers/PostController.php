<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(2);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
       $this->validate($request, [
           'body' => 'required'
       ]);

       //create a post through a user
    
     auth()->user()->posts()->create($request->only('body'));

     return back();

    }

    public function destroy(Post $post)
    {
       $post -> delete();

       return back();
    }
}
