<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function apiIndex($id)
    {
        $comments = Comment::orderBy('id', 'desc')->where('post_id', $id)->get();
        return $comments;
    }

    public function store(Request $request, $id)

    {
        $validateData = $request->validate([
            'body' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);

        $c = new Comment;
        $c->user_id = $user->id;
        $c->post_id = $id;
        $c->user = $user->username;
        $c->body = $validateData['body'];
        $c->likes = 1;
        $c->save();

        session()->flash('message', 'Comment Was Created.');
        return redirect()->route('posts.show', ['id' => $id]);
        //dd($request['title']);
    }
}
