@extends('layouts.app')
@section('title','Post')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    <div class="col-md-8">
    <h1>Post</h1>
        <div id="root">
            <a href="{{ route('posts.index')}}">back to posts</a><br><br>
            User: <a href="{{ route('users.show', ['user' => $post->user]) }}">{{$post->user->username}}</a> <br> 
            Title: {{$post->title}} <br>
            Post: {{$post->body}} <br>
            <div id="delete_edit">
                <form method="POST" action="{{ route('post.destroy', ['id' => $post->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete Post</button>
                </form>
                
                <button type="submit" onclick="window.location='{{ route('posts.edit', ['id' => $post->id])}}'">Edit Post</button>
            </div>
                    
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
    </div>

    <script type="text/javascript">
            
            var postUser =  {!! json_encode($post->user->id) !!};
            var currentUser = {!! json_encode(auth()->user()->id) !!};
            if(postUser != currentUser){
                document.getElementById("delete_edit").innerHTML = "";

            }
            
    </script>
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