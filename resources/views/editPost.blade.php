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
                </button> <input type="submit" class="btn btn-primary" value="Update">
                <hr>
            </form>
        </div>
    </div>
</div>
@endsection
