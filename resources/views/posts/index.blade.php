@extends('layouts.app')
@section('title','All Posts')


@section('content')
<a href="{{ route('home')}}">Go Back</a>

    <p>The posts of storiboard</p>
    <a href="{{ route('posts.create')}}">Add Post</a>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', ['id' => $post->id])}}">{{$post->title}}</a> 
            by <a href="{{ route('users.show', ['user' => $post->user]) }}">{{$post->user->username}}</a></li>
        @endforeach
    </ul>
    

@endsection
