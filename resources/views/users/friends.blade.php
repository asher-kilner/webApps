@extends('layouts.app')
@section('title','User')


@section('content')

    <a href="{{ route('home')}}">back home</a>

    <p>
        list of your friends: <br> 
        <ul>
            @foreach ($friends as $friend)
                <li><a href="{{ route('users.show', ['id' => $friend->id])}}">{{$friend->username}}</a></li>
            @endforeach
        </ul>
    </p>    
    
    

@endsection