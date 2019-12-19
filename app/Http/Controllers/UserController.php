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

        $currentUserId = auth()->user()->id;
        $currentUser = User::findOrFail($currentUserId);
        foreach ($currentUser->friends as $friend){
            if($friend->id == $id){
                session()->flash('message', 'you are already friends.');
                return view('users.show')->with('user', $user)->with('posts', $posts);
            }
        }
        $currentUser->friends()->attach($id);
        session()->flash('message', 'Friend was added.');
        return view('users.show')->with('user', $user)->with('posts', $posts);
    }

    public function myFriends()
    {
        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        $friends = $user->friends;
        //dd($friends);
        return view('users.friends')->with('friends', $friends);
    }
}