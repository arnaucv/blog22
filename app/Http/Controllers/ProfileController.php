<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $user=Auth::user();
        $posts = $user->posts;

        return view('profile', ['user'=>$user, compact('posts')]);
    }
}
