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

                    {{ __('Welcome to the management table.') }}
                </div>
            </div>
        </div>

        <div class="card p-5 bg-blue-300">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>email</th>
                </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('users.edit', $user) }}"><button class="btn btn-secondary" alt="editProfile">Edit</button></a></td>
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf @method('DELETE')
                        <td><input type="submit" value="Delete" class="btn btn-danger"></td>
                    </form>
                </tr>
            @endforeach
            </table>
        </div>
        <div class="card p-5 bg-blue-300">
            @foreach ($posts as $post)
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->contents }}</p>
            <span>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </span>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
