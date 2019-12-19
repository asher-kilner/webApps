@extends('layouts.app')
@section('title','your mum')


@section('content')
<div class="col-md-8">
<h1>Edit post</h1>
    <div id="root">
        <form method="POST" id="edit_post" action="{{ route('post.update', ['id' => $post->id]) }}">
            @csrf
                <p>Title: <text type="text" name="title">{{ $post->title }}</text></p>      
                <p>Post:<br><textarea form ="edit_post" name="body" id="body" value="{{$post->body}}" 
                rows="5"cols="100" wrap="soft">{{$post->body}}</textarea></p>
                <input type="submit" value="Update">
            <a href="{{ route('posts.index')}}">Cancel</a>
        </form>
    </div>
</div>

@endsection