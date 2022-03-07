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

                    {{ __('Welcome to your profile, '. $user->username) }}
                </div>
            </div>
        </div>
        <div class="card p-5 bg-blue-300">
            <div class="card-header">{{__('Your Data')}}</div>
            <h4>Your Name: {{$user->username}}</h4>
            <h4>Your Mail: {{$user->email}}</h4>
            <h4>Your Rol: {{$user->rol->rol}}</h4>
        </div>
        <div class="p-5 bg-blue-300">
            <a href="{{ route('editProfile') }}"><button class="btn btn-secondary" alt="editProfile">Edit Profile</button></a>
            <a href="{{ route('myPosts') }}"><button class="btn btn-secondary" alt="myPosts">My Posts</button></a>
        </div>
    </div>
</div>
@endsection
