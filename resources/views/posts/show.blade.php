@extends('layouts.app')
@section('title','Post')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    

    <div id="root">
        <a href="{{ route('posts.index')}}">back to posts</a><br><br>
        User: <a href="{{ route('users.show', ['id' => $post->user->id]) }}">{{$post->user->username}}</a> <br> 
        Title: {{$post->title}} <br>
        Body: {{$post->body}} <br>

        
        <p>
            Post a Comment:<br>
            <form method="POST" action="{{ route('comment.store', ['id' => $post->id])}}">
            @csrf
                <p>{{auth()->user()->username}}: <input type="text" name="body"
                    value="{{old('body')}}"></p>
                <input type="submit" value="submit">
            </form>
        </p>    
        <ul>
            <li v-for="comment in comments"> @{{ comment.user }} says: @{{ comment.body }}</li>
        </ul>

    </div>

    <script>
        var app = new Vue({
            el: "#root",
            data: {
                comments: [],
            },
            mounted() {
                axios.get("{{ route ('api.comments.index', ['id' => $post->id]) }}")
                .then(response => {
                    //handle successs
                    this.comments = response.data;
                })
                .catch(response => {
                    //handle errors
                    console.log(response);
                })
            },
        });
        

    </script>
    

@endsection