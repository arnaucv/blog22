<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Rol;
use App\User;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $users = User::all();
        // where('rol_id', 2);
        $posts = Post::all();

        return view('manage', ['users'=>$users, 'posts'=>$posts]);
    }
}
