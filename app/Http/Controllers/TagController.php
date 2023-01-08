<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index ()
    {
        $tags = Tag::get();
        return view('dashboard.tags.index', [
            'tags' => $tags
        ]);
    }

    public function create ()
    {
        return view('dashboard.tags.create');
    }

    public function store (StoreTagRequest $request)
    {
        Tag::create([
            'name' => $request->input('name')
        ]);
        return redirect(route('tags'))->with('tag', 'Tag created successfully!');
    }

    public function edit ($id)
    {
        $tag = Tag::find($id);
        return view('dashboard.tags.edit', [
            'tag' => $tag
        ]);
    }

    public function update (UpdateTagRequest $request, $id)
    {
        $tag = Tag::find($id);
        $tag->update([
            'name' => $request->input('name')
        ]);
        return redirect(route('tags'))->with('tag', 'Tag Updated successfully!');
    }
}
