<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index ()
    {
        $posts = Post::get();
        return view('dashboard.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create ()
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('dashboard.posts.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function store (StorePostRequest $request)
    {
        $user_id = Auth::id();
        $data = [
            'title' => $request->input('title'),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'user_id' => $user_id,
            'category_id' => $request->category,
            'views' => 0
        ];
        $newImageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move('uploads/blogs/', $newImageName);
        $data['image'] = $newImageName;

        $post = Post::create($data);
        $post->tags()->attach($request->tags);
        return redirect(route('posts'))->with('post', 'Your Post Created Successfully!!!');
    }

    public function edit ($id)
    {
        $post = Post::find($id);
        $selectedTag = [];
        foreach($post->tags as $tag) {
            $selectedTag[] = $tag->id;
        }
        $categories = Category::get();
        $tags = Tag::get();
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'selectedTag' => $selectedTag,
        ]);
    }

    public function update (UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        $data = [
            'title' => $request->input('title'),
            'category_id' => $request->input('category'),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
        ];
        if(isset($request->image)) {
            $oldimage = $post->image;
            unlink('uploads/blogs/'.$oldimage);
            $newImageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('uploads/blogs/', $newImageName);
            $data['image'] = $newImageName;
        }
        $post->update($data);
        $post->tags()->sync($request->tags);
        return redirect(route('posts'))->with('post', 'Your Post Updated Successfully!!!');
    }

    public function delete ($id)
    {
        $post = Post::find($id);
        unlink('uploads/blogs/'.$post->image);
        $post->tags()->detach();
        $post->delete();
        return redirect(route('posts'))->with('post', 'Your Post Deleted Successfully!!!');
    }

}
