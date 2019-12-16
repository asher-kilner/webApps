<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    
    {
        $comments = Comment::orderBy('id', 'desc')->where('post_id', $post->id)->get();
        //dd($comments);

        return view('posts.show')->with('post', $post)->with('comments', $comments);    
    }

    public function create()
    
    {
        return view('posts.create');
    }

    public function store(Request $request)

    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $p = new Post;
        $p->user_id = 1;
        $p->title = $validateData['title'];
        $p->body = $validateData['body'];
        $p->save();

        session()->flash('message', 'Post Was Created.');
        return redirect()->route('posts.index');
    }

    public function destroy($id)

    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post was destroyed.');
    }

}
