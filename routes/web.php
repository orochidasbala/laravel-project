<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;

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

Route::get('/', function () {
    // DB::listen(function ($query) {
    //     logger($query->sql);    //Log::info() == loger();
    // });
    return view('blogs', [
        'blogs' => Blog::latest()->get() //all() //with('category', 'author')->get() //eager load or lazy loading
    ]);
}); 

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog', [
        'blog' => $blog
    ]);
})->where('blog', '[A-z\d\-_]+');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'blogs' => $category->blogs //->load('author', 'category')
    ]);
});

Route::get('/user/{user:username}', function(User $user){
    return view('blogs', [
        'blogs'=> $user->blogs //->load('author', 'category')
    ]);
});