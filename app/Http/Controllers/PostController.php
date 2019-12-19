<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Twitter;
use Illuminate\Http\Request;

class PostController extends Controller
{
    

    public function exampleMethod(Post $post, Twitter $t){
        dd($t);
        
        return "this example method returns";
    }



    public function index()
    
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function show($id)
    
    {
        $post = Post::findOrFail($id);
        $comments = Comment::orderBy('id', 'desc')->where('post_id', $post->id)->get();
        
        return view('posts.show')->with('post', $post)->with('comments', $comments);    
    }

    public function create()
    
    {
        return view('posts.create');
    }

    public function edit($id)
    
    {
        $post = Post::findOrFail($id);
        return view('posts.edit')->with('post', $post);
    }

    public function store(Request $request)

    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $p = new Post;
        $p->user_id = auth()->user()->id;
        $p->title = $validateData['title'];
        $p->body = $validateData['body'];
        $p->save();
        return redirect()->route('posts.index')->with('message', 'Post Was Created.');
    }

    public function update(Request $request, $id)

    {
        $validateData = $request->validate([
            'body' => 'required',
        ]);
        
        $post = Post::findOrFail($id);
        $post->user_id =auth()->user()->id;
        $post->body = $validateData['body'];
        $post->save();
        
        return redirect()->route('posts.index')->with('message', 'Post Was Created.');
    }

    public function destroy($id)

    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post was destroyed.');
    }

}
