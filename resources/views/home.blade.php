@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p><a href="{{ route('posts.index')}}">Show all posts</a></p>
                    <p><a href="{{ route('users.friends')}}">Show all friends</a></p>
                    <p><a href="{{ route('posts.create')}}">Create post</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
