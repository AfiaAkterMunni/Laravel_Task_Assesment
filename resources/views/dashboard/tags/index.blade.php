@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>All Tags</h2>
                    <a href="{{ route('tags.create') }}" class="btn btn-success">Create Tag</a>
                </div>

                <div class="card-body">
                    @if (session('tag'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('tag') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(count($tags) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tag Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $index => $tag)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $tag->name }}</td>
                                        <td>
                                            <a href="{{ route('tags.edit', ['id' => $tag->id]) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h5 class="text-center">No tags Available!!</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
