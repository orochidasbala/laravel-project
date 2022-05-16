<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;


Route::get('/',[BlogController::class, 'index'] );

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])
->where('blog', '[A-z\d\-_]+');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'blogs' => $category->blogs, //->load('author', 'category')
        'categories' => Category::all(),
        'currentCategory' => $category
    ]);
});

Route::get('/user/{user:username}', function (User $user) {
    return view('blogs', [
        'blogs' => $user->blogs, //->load('author', 'category')
        'categories' => Category::all()
    ]);
});

