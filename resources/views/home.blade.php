@extends('layouts.app')
@section('title','Home')
@section('content')


    <p>The posts of storiboard</p>

    <ul>
        <li><a href="{{ route('posts.index')}}">Show all posts</a></li>
    </ul>

    <a href="{{ route('posts.create')}}">Create post</a>
    

@endsection