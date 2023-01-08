@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>Edit Tag</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('tags.update', ['id' => $tag->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tag Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $tag->name }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
