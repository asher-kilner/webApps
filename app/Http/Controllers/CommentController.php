<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    
    {
    }

    public function show($id)
    
    {
    }

    public function create()
    
    {
    }

    public function store(Request $request)

    {
        $validateData = $request->validate([
            'post_id' => 'required',
            'body' => 'required',
        ]);

        $c = new Comment;
        $c->user_id = 1;
        $c->post_id = $validateData['post_id'];
        $c->body = $validateData['body'];
        $c->parent_id = null;
        $c->likes = 1;
        $c->save();

        session()->flash('message', 'Comment Was Created.');
        return redirect()->route('posts.show', ['id' => $validateData['post_id']]);
        //dd($request['title']);
    }
}
