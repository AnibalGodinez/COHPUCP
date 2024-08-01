{{-- resources/views/footer_contents/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Footer Content</h1>
    <form action="{{ route('footer-content.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="facebook_link">Facebook Link</label>
            <input type="text" name="facebook_link" id="facebook_link" class="form-control" value="{{ old('facebook_link') }}">
        </div>
        <!-- Repeat for other fields like twitter_link, youtube_link, etc. -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
