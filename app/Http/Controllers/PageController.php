<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index ()
    {
        $posts = Post::latest()->paginate(4);
        $recentPosts = Post::latest()->limit(4)->get();
        $categories = Category::get();
        $tags = Tag::get();
        return view('index', [
            'posts' => $posts,
            'recentPosts' => $recentPosts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function search (Request $request)
    {
        $recentPosts = Post::latest()->limit(4)->get();
        $categories = Category::get();
        $tags = Tag::get();
        $posts = Post::where('title', 'LIKE', "%$request->search%")->paginate(4);
        return view('index', [
            'posts' => $posts,
            'recentPosts' => $recentPosts,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function show ($id)
    {
        $recentPosts = Post::latest()->limit(4)->get();
        $categories = Category::get();
        $tags = Tag::get();
        $post = Post::find($id);
        $post->views++;
        $post->update();
        return view('singleView', [
            'post' => $post,
            'recentPosts' => $recentPosts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }
}
