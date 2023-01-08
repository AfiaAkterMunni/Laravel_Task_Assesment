@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>Create Post</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="title" class="form-label">Title</label>
                            <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="short_description" class="form-label">Short Description</label>
                            <input id="short_description" type="text" class="form-control" name="short_description" value="{{ $post->short_description }}">
                            @error('short_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="image" class="form-label">Thumbnail Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="category" id="category">
                                <option selected disabled>-- Select categroy --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id === $post->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="tags" class="form-label">Tags</label>
                            <select class="form-select" multiple name="tags[]">
                                <option selected disabled>-- Select Multiple Tag</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" @if (in_array($tag->id, $selectedTag)) selected @endif>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ $post->description }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
