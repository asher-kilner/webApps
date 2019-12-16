@extends('layouts.app')
@section('title','All Posts')


@section('content')
<a href="{{ route('home')}}">Go Back</a>

    <p>The posts of storiboard</p>
    <a href="{{ route('posts.create')}}">Add Post</a>
    <ul>
        @foreach ($posts as $post)
            <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
    

@endsection
