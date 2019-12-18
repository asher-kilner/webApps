<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = Post::orderBy('id', 'desc')->where('user_id', $user->id)->get();
        return view('users.show')->with('user', $user)->with('posts', $posts);
    }

    public function friend($id)
    {
        $user = User::findOrFail($id);
        $posts = Post::orderBy('id', 'desc')->where('user_id', $user->id)->get();
        return view('users.show')->with('user', $user)->with('posts', $posts);
    }
}