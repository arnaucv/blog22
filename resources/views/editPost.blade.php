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

                    {{ __('Welcome to the post editor.') }}
                </div>
            </div>
        </div>
        <div class="card p-5 bg-blue-300">
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf @method('PUT')
                <input type="text" name="title" id="title" value="{{ $post->title }}"><br>
                <textarea name="contents" id="contents" cols="30" rows="10">{{ $post->contents }}</textarea>
                <input type="submit" class="btn btn-primary" value="Update">
                <hr>
            </form>
            <div>
                @foreach ($tags as $tag)
                    <button class="btn btn-success">{{ $tag->tag }}</button>
                @endforeach
            </div>
            <hr>
            <h3>Add a new tag</h2>
            <form action="{{ route('tags.store') }}" method="POST">
                @csrf @method('POST')
                <input type="number" name="postId" id="postId" value="{{ $post->id }}" class="postIdBox">
                <input type="text" name="tag" id="tag" placeholder="New Tag">
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
</div>
@endsection
