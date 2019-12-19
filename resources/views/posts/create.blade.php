@extends('layouts.app')
@section('title','your mum')


@section('content')

<div class="col-md-8">
<h1>Create your post</h1>
    <form method="POST" id="create_post" action="{{ route('post.store')}}">
        @csrf
        <p>Title: <input type="text" name="title" 
        value="{{old('title') }}"></p>       
        <p>Post:<br><textarea form ="create_post" name="body" id="body" value="{{old('body') }}" rows="5"cols="100" wrap="soft"></textarea></p>
        <input type="submit" value="submit">
        <a href="{{ route('posts.index')}}">Cancel</a>
    </form>
</div>


@endsection