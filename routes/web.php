<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActionsController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {

    return view('home', ["posts" => Post::latest()->filter()->get(), "title" => "Kumpulan Cerita Pendek"]);
});

Route::get("/detail/{post:id}", function(Post $post) {

    return view("detail", ["title" => "Single Post", "post" => $post]);
});

Route::get('/add', function () {
    return view('add');
});

Route::get('/delete', function () {
    return view('delete');
});

Route::get('/edit', function () {
    return view('edit');
});

Route::get("/authors/{user:username}", function(User $user) {

    return view("home", ["posts" => $user->posts, "title" => "Penulis"]);
});

Route::get("/categories/{category}", function(Category $category) {

    return view("home", ["posts" => $category->posts, "title" => "Genre"]);
});

Route::get('/login', [LoginController::class, "index"])->middleware("guest");
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);

Route::get('/register', [RegisterController::class, "index"]);
Route::post('/register', [RegisterController::class, "store"]);

Route::resource("/add", ActionsController::class)->middleware("auth");

Route::get('/login', function () {
    return view('index', ["title" => "Halaman Login"]);
})->name('login');