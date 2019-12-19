@extends('layouts.app')
@section('title','All Posts')


@section('content')
<div class="col-md-8">
<h1>The posts of storiboard</h1>
    <a href="{{ route('home')}}">Go Back</a>
        <a href="{{ route('posts.create')}}">Add Post</a>
        <ul>
            @foreach ($posts as $post)
                <li><a href="{{ route('posts.show', ['id' => $post->id])}}">{{$post->title}}</a> 
                by <a href="{{ route('users.show', ['user' => $post->user]) }}">{{$post->user->username}}</a></li>
            @endforeach
        </ul>`
</div>

@endsection
