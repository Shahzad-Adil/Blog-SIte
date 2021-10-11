<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController; 
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FrontEndController;

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

// Route::get('/', function(){
//     return view('welcome');
// });

Route::get('/', [
    FrontEndController::class, 'index'
])->name('index');

Route::get('/post/{slug}', [
    FrontEndController::class, 'singlePost'
])->name('post.single');

Route::get('/category/{id}', [
    FrontEndController::class, 'category'
])->name('category.single');

Route::get('/tag/{id}', [
    FrontEndController::class, 'tag'
])->name('tag.single');

Route::get('/myresults', [
    FrontEndController::class, 'myresults'

]);

Route::post('/subscribe', function(){
    $email = request('email');

    Newsletter::subscribe($email);

    Session::flash('subscribed', 'Subscription Successful.');

    return redirect()->back();
});

Route::get('/dashboard', function () {
    return view('dashboard')->with('published_count', \App\Models\Post::all()->count())
                            ->with('trashed_count', \App\Models\Post::onlyTrashed()->get()->count())
                            ->with('users_count', \App\Models\User::all()->count())
                            ->with('categories_count', \App\Models\Category::all()->count());
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/post/create',[
    PostsController::class, 'create'
])->middleware(['auth'])->name('post.create');

Route::post('/post/store',[
    PostsController::class, 'store'
])->middleware(['auth'])->name('post.store');

Route::get('/posts', [
    PostsController::class, 'index'
])->middleware(['auth'])->name('posts');

Route::get('/post/delete/{id}', [
    PostsController::class, 'destroy'
])->middleware(['auth'])->name('post.delete');

Route::get('/post/trashed', [
    PostsController::class, 'trashed'
])->middleware(['auth'])->name('post.trashed');

Route::get('/post/edit/{id}', [
    PostsController::class, 'edit'
])->middleware(['auth'])->name('post.edit');

Route::post('/post/update/{id}', [
    PostsController::class, 'update'
])->middleware(['auth'])->name('post.update');

Route::get('/post/kill/{id}', [
    PostsController::class, 'kill'
])->middleware(['auth'])->name('post.kill');

Route::get('/post/restore/{id}', [
    PostsController::class, 'restore'
])->middleware(['auth'])->name('post.restore');

Route::get('/category/create', [
    CategoriesController::class, 'create'
])->middleware(['auth'])->name('category.create');

Route::post('/category/store' , [
    CategoriesController::class, 'store'
])->middleware(['auth'])->name('category.store');

Route::get('/categories', [
    CategoriesController::class, 'index'
])->middleware(['auth'])->name('categories');


Route::get('/category/edit/{id}', [
    CategoriesController::class, 'edit'
])->middleware(['auth'])->name('category.edit');

Route::post('/category/update/{id}', [
    CategoriesController::class, 'update'
])->middleware(['auth'])->name('category.update');

Route::get('/category/delete/{id}', [
    CategoriesController::class, 'destroy'
])->middleware(['auth'])->name('category.delete');


Route::get('/tags', [
    TagsController::class, 'index'
])->middleware(['auth'])->name('tags');


Route::get('/tag/edit/{id}', [
    TagsController::class, 'edit'
])->middleware(['auth'])->name('tag.edit');

Route::post('/tag/update/{id}', [
    TagsController::class, 'update'
])->middleware(['auth'])->name('tag.update');

Route::get('/tag/delete/{id}', [
    TagsController::class, 'destroy'
])->middleware(['auth'])->name('tag.delete');

Route::get('/tag/create', [
    TagsController::class, 'create'
])->middleware(['auth'])->name('tag.create');

Route::post('/tag/store' , [
    TagsController::class, 'store'
])->middleware(['auth'])->name('tag.store');

Route::get('/test', function(){
    return App\Models\User::find(1)->profile;
});

Route::get('/users', [
    UsersController::class, 'index'
])->middleware(['auth'])->name('users');

Route::get('/user/create', [
    UsersController::class, 'create'
])->middleware(['auth'])->name('user.create');

Route::post('/user/store' , [
    UsersController::class, 'store'
])->middleware(['auth'])->name('user.store');

Route::get('/user/admin/{id}', [
    UsersController::class, 'admin'
])->middleware(['auth'])->name('user.admin');

Route::get('/user/not-admin/{id}', [
    UsersController::class, 'not_admin'
])->middleware(['auth'])->name('user.not.admin');

Route::get('/user/profile', [
    ProfilesController::class, 'index'
])->middleware(['auth'])->name('user.profile');

Route::post('/user/profile/update', [
    ProfilesController::class, 'update'
])->middleware(['auth'])->name('user.profile.update');

Route::get('/user/delete/{id}', [
    UsersController::class, 'destroy'
])->middleware(['auth'])->name('user.delete');

Route::get('/settings}', [
    SettingController::class, 'index'
])->middleware(['auth'])->name('settings');

Route::post('/settings/update', [
    SettingController::class, 'update'
])->middleware(['auth'])->name('settings.update');

