<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $posts = Post::orderBy('id', 'desc')->where('user_id', $user->id)->get();
        $currentUserId = auth()->user()->id;
        $currentUser = User::findOrFail($currentUserId);
        $friends = $currentUser->friends;
        return view('users.show')->with('user', $user)->with('posts', $posts)->with('friends', $friends);
    }

    public function addFriend($id)
    {
        $user = User::findOrFail($id);
        $posts = Post::orderBy('id', 'desc')->where('user_id', $user->id)->get();
        $currentUserId = auth()->user()->id;
        $currentUser = User::findOrFail($currentUserId);
        $currentUser->friends()->attach($id);
        session()->flash('message', 'Friend was added.');
        $friends = $currentUser->friends;
        return redirect()->route('posts.index')->with('message', 'Post was destroyed.');
    }

    public function removeFriend($id)
    {
        $currentUserId = auth()->user()->id;
        $currentUser = User::findOrFail($currentUserId);
        $currentUser->friends()->detach($id);
        session()->flash('message', 'Friend was removed.');
        return redirect()->route('home')->with('message', 'Post was destroyed.');
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