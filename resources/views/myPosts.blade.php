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

                    {{ __('Welcome to your posts.') }}
                </div>
            </div>
        </div>
        <a href="{{ route('createPost') }}"><button class="btn btn-success">Create Post</button></a>
        <div class="card p-5 bg-blue-300">
            @foreach ($posts as $post)
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->contents }}</p>
            <span>
                <a href="{{ route('posts.edit', $post) }}"><button class="btn btn-primary">Edit</button></a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </span>
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
