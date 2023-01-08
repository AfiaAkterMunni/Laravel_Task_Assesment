@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h2>All Posts</h2>
                        <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
                    </div>

                    <div class="card-body">
                        @if (session('post'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('post') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Post Title</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $index => $post)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('posts.delete', ['id' => $post->id]) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                @else
                    <h5 class="text-center">No Posts Available!!</h5>
                @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
