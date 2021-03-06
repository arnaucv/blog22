@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="p-2 bg-blue-300">
            @foreach ($posts as $post)
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->contents }}</p>
            <a href="{{ route('posts.show',  $post) }}"><button class="btn btn-primary">Comments</button></a>
            <button class="btn btn-success likeDislike"><img src="{{asset('img/thumbsup.png')}}" alt="thumbsup"></button>
            <button class="btn btn-danger likeDislike"><img src="{{asset('img/thumbsdown.png')}}" alt="thumbsdown"></button>
            <hr>
            <div>
                @foreach ($post->tags as $tag)
                    <button class="btn btn-success">{{ $tag->tag }}</button>
                @endforeach
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
