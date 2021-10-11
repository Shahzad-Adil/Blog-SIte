<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class FrontEndController extends Controller
{
    public function index(){
        return view('index')
                    ->with('title', Setting::first()->site_name)
                    ->with('categories', Category::take(4)->get())
                    ->with('first_post', Post::orderBy('created_at', 'desc')->first())
                    ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
                    ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
                    ->with('wordpress', Category::find(3))
                    ->with('tutorial', Category::find(5))
                    ->with('settings', Setting::first());

    }

    public function singlePost($slug){
        $post = Post::where('slug', $slug)->first();

        $prev_id = Post::where('id', '<', $post->id)->max('id');

        $next_id = Post::where('id', '>', $post->id)->min('id');


        return view('single')->with('post', $post)
                                ->with('title', $post->title)
                                ->with('settings', Setting::first())
                                ->with('categories', Category::take(4)->get())
                                ->with('next', Post::find($next_id))
                                ->with('prev', Post::find($prev_id))
                                ->with('tags', Tag::all());

    }

    public function category($id){

        $category = Category::find($id);

        return view('category')->with('category' , $category)
                                ->with('title', $category->title)
                                ->with('settings', Setting::first())
                                ->with('categories', Category::take(4)->get());
    }

    public function tag($id){

        $tag = Tag::find($id);

        return view('tag')->with('tag' , $tag)
                                ->with('title', $tag->tag)
                                ->with('settings', Setting::first())
                                ->with('categories', Category::take(4)->get());
    }

    public function myresults(){
        $posts = Post::where('title','like','%' . request('query') . '%')->get();

        return view('results')->with('posts', $posts)
                                ->with('title', 'Search Results : '.request('query'))
                                ->with('settings', Setting::first())
                                ->with('categories', Category::take(4)->get())
                                ->with('query', request('query'));
    }
}
