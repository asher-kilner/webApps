@extends('layouts.app')
@section('title','Post')


@section('content')

    <a href="{{ route('posts.index')}}">back to posts</a>

    <p>
        User: <a href="{{ route('users.show', ['id' => $post->user->id]) }}">{{$post->user->username}}</a> <br> 
        Title: {{$post->title}} <br>
        Body: {{$post->body}} <br>

        <form method="POST"
            action="{{ route('post.destroy', ['id' => $post->id])}}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>


        <form method="POST" action="{{ route('comment.store')}}">
        @csrf
            <p>Post ID: <input type="text" name="post_id"
                value="{{$post->id}}"></p>
            <p>Post: <input type="text" name="body"
                value="{{old('body')}}"></p>
            <input type="submit" value="submit">
        </form>
        Comments: <br>
            <ul>
                @foreach ($comments as $comment)
                    <li>{{$comment->body}}</li>
                @endforeach
            </ul>
    </p>    
    
    

@endsection