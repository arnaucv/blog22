@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="p-2 bg-blue-300">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->contents }}</p>
            <button class="btn btn-success likeDislike"><img src="{{asset('img/thumbsup.png')}}" alt="thumbsup"></button>
            <button class="btn btn-danger likeDislike"><img src="{{asset('img/thumbsdown.png')}}" alt="thumbsdown"></button>
            <hr>
            <h2>Comments</h2>
            <hr>
            @foreach ($comments as $comment)
            <h3>{{ $comment->user->username }}</h3>
            <p>{{ $comment->comment }}</p>
            <hr>
            @endforeach
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Comment Creation') }}</div>

              <div class="card-body">
                    <form action="{{ route('comments.store') }}" method="POST" class="form">
                        @csrf @method('POST')
                        <input type="number" name="postId" id="postId" value="{{ $post->id }}" class="postIdBox">
                        <textarea name="commentArea" id="commentArea" cols="75" rows="5"></textarea>
                        <input type="submit" value="Comentar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
