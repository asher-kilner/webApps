@extends('layouts.app')
@section('title','User')


@section('content')

    <a href="{{ route('posts.index')}}">back to posts</a>

    <p>
        Username: {{$user->username}}<br> 
        Title: {{$user->title}} <br>
        favourite genre: {{$user->favourite_genre}} <br>

        <form method="POST" action="{{ route('users.friend', ['id'=>$user->id]) }}">
        @csrf
            <button type="submit">Add as friend</button>
        </form>

        posts: <br>
            <ul>
                @foreach ($posts as $post)
                    <li><a href="{{ route('posts.show', ['id' => $post->id])}}">{{$post->title}}</a></li>
                @endforeach
            </ul>
    </p>    
    
    

@endsection