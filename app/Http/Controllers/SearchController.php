<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function fetch(Request $request)
    {
        $searchString = $request->get('searchbox');
        $posts = Post::where('title', 'LIKE', "%{$searchString}%")->get();


        return view('search', compact('posts'));
    }
}
