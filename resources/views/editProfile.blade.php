@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card p-5 bg-blue-300">
            <div class="card-header">{{__('Your Data')}}</div>
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf @method('PUT')
                <label for="username">Your Name: {{$user->username}}</label><br>
                <input type="text" name="username" id="username" placeholder="new username"><br>
                <label for="email">Your Mail: {{$user->email}}</label><br>
                <input type="email" name="email" id="email" placeholder="new email"><br><br>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card p-5 bg-blue-300">
            <div class="card-header">{{__('Password Modification')}}</div>
            <form action="{{ route('editProfilePassword',  $user) }}" method="POST">
                @csrf @method('PUT')
                <label for="password">Your New Password:</label><br>
                <input type="password" name="password" id="password" placeholder="new password"><br><br>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>
</div>
@endsection
