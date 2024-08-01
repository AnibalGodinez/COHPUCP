{{-- resources/views/footer_contents/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Footer Content</h1>
    <form action="{{ route('footer-content.update', $footerContent->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $footerContent->title) }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $footerContent->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="facebook_link">Facebook Link</label>
            <input type="text" name="facebook_link" id="facebook_link" class="form-control" value="{{ old('facebook_link', $footerContent->facebook_link) }}">
        </div>
        <!-- Repeat for other fields like twitter_link, youtube_link, etc. -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
