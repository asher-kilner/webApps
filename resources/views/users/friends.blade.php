@extends('layouts.app')
@section('title','Friends')


@section('content')

<h1> My Friends List </h1>
    <div id="root">
        
        <a href="{{ route('home')}}">back home</a>

        <div id="friends">
            <p>
                list of your friends: <br> 
                <ul>
                    @foreach ($friends as $friend)
                        <li><a href="{{ route('users.show', ['id' => $friend->id])}}">{{$friend->username}}</a></li>
                    @endforeach
                </ul>
            </p>   
        </div>
        <div id="demo">

        </div>

        <script>
        //document.getElementById("demo").innerHTML = "<p>Find user Profiles to make friends!</p>";
        var friends = {{json_encode($friends)}};
        if (friends) {

            document.getElementById("friends").innerHTML = "<p>Find user Profiles to make friends!</p>";
        }
    </script>
    </div>

    
@endsection