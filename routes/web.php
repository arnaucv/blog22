<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth','rol:admin'])->prefix('admin')->group(function(){
    Route::get('/users', function(){
        return User::all();
    })->name('admin.users');
    Route::get('/posts', function(){
        return Post::all();
    })->name('admin.posts');
});

Route::middleware(['auth','rol:admin'])->get('/manage', 'ManageController@index')->name('manage');

/* En conflicto con showPost
Route::get('posts/{post?}', function($id=null){
    if ($id == null) {
        return Post::all();
    }
    $post = Post::findOrFail($id);
    return $post;
})->where(['post','[0-9]+']);
*/

Route::get('/editProfile', 'EditProfileController@index')->name('editProfile');
Route::put('/editProfilePassword', 'EditProfileController@updatePassword')->name('editProfilePassword');

Route::get('/myPosts', 'MyPostsController@index')->name('myPosts');

Route::get('/createPost', 'CreatePostController@index')->name('createPost');

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::post('/search', 'SearchController@fetch')->name('search');

/*
Route::get('posts/{post}', function(Post $post){

    return $post;
});
*/

Route::resources([
    'posts'=>'PostController',
    'users'=>'UserController',
    'comments'=>'CommentController',
    'tags'=>'TagController'

]);

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

