<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use App\User;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $user=Auth::user();

        if($user=Auth::user()) {
            $posts = Post::where('user_id', $user->id)->get();
        }
        else {
            $posts = Post::all();
        }


        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request, $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = explode(',', $request->get('tags'));

        $user = Auth::user();

        $attributes=$request->validate([
            'title' => 'required|max:255',
            'contents' => 'required|max:255',
        ]);

        $attributes['user_id'] = $user->id;

        $post = Post::create($attributes);


        // $post->save();

/*
        $user = Auth::user();

        $post = new Post();
        $post->title = $request->get('title');
        $post->contents = $request->get('contents');
        $post->user_id = $user->id;

        ddd($post->id);
        // $post->save();
*/
        foreach($tags as $tag) {
            $t=Tag::create(['tag'=>$tag]);

            $post->tags()->attach($t);
        }

        return redirect('/myPosts')->with('success', 'The user is successfully updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $comments = $post->comments;
        return view('showPost', ['post'=>$post, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = $post->tags;

        return view('editPost', ['post'=>$post, 'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'contents' => 'required|max:255',
        ]);

        $post->update($validatedData);
        return redirect('/myPosts')->with('success', 'The post is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->destroy($post->id);

        return redirect('/myPosts')->with('success', 'The post is successfully deleted');
    }
}
