@extends('layouts.app')
@section('title','User')


@section('content')
<h1>User Profile</h1>
    <div id="root">
        <a href="{{ route('posts.index')}}">back to posts</a><br>
        Username: {{$user->username}}<br> 
        Title: {{$user->title}} <br>
        favourite genre: {{$user->favourite_genre}} <br>

        <div id="add_friend">
            <form method="POST" action="{{ route('users.add-friend', ['id'=>$user->id]) }}">
                @csrf
                <button type="submit">Add friend</button> 
             </form>
        </div>

        <div id="remove_friend">
            <form method="POST" action="{{ route('users.remove-friend', ['id'=>$user->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Remove friend</button> 
             </form>
        </div>

        <div id="demo">

        </div>
        posts: <br>
            <ul>
                @foreach ($posts as $post)
                    <li><a href="{{ route('posts.show', ['id' => $post->id])}}">{{$post->title}}</a></li>
                @endforeach
            </ul>  

        <script type="text/javascript">
            
            var friends = {!! json_encode($friends->toArray()) !!};
            var user = {!! json_encode($user->id) !!};
            var friendExists = false;
            friends.forEach(friend => {
                if(friend.id == user){
                    document.getElementById("add_friend").innerHTML = "";
                    friendExists = true;
                }
            });
            if(!friendExists){
                document.getElementById("remove_friend").innerHTML = "";
            }
            
        </script> 
    </div>
    

@endsection