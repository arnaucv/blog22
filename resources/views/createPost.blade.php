@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card p-5 bg-blue-600">
            <div class="input-group mb3">{{__('New Post')}}</div>
            <form action="{{ route('posts.store', $user) }}" method="POST">
                @csrf @method('POST')
                <label for="title">Post Title:</label><br>
                <input type="text" name="title" id="title" placeholder="post title" class="input-group-text"><br>
                <label for="contents">Post Content:</label><br>
                <input type="text" name="contents" id="contents" placeholder="contents" class="input-group-text"><br><br>
                <input type="submit" value="Upload" class="btn-info">
            </form>
        </div>
    </div>
</div>
@endsection
