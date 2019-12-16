@extends('layouts.app')
@section('title','your mum')


@section('content')

    <form method="POST" action="{{ route('post.store')}}">
        @csrf

        <p>Title: <input type="text" name="title" 
        value="{{old('title') }}"></p>
        <p>Post: <input type="text" name="body"
            value="{{old('body') }}"></p>
        <input type="submit" value="submit">
        <a href="{{ route('posts.index')}}">Cancel</a>
    </form>
    

@endsection