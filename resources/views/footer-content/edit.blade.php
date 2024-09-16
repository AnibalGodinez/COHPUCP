{{-- resources/views/footer_contents/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card m-7">
                <div class="card-body">
                    <h3 class="card-title text-center w-100">Edit Footer Content</h3>
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
                            <label for="links">Links</label>
                            <input type="text" name="links" id="links" class="form-control" value="{{ old('links', $footerContent->links) }}">
                        </div>
                        <div class="form-group">
                            <label for="facebook_link">Facebook Link</label>
                            <input type="url" name="facebook_link" id="facebook_link" class="form-control" value="{{ old('facebook_link', $footerContent->facebook_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="twitter_link">Twitter Link</label>
                            <input type="url" name="twitter_link" id="twitter_link" class="form-control" value="{{ old('twitter_link', $footerContent->twitter_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube_link">YouTube Link</label>
                            <input type="url" name="youtube_link" id="youtube_link" class="form-control" value="{{ old('youtube_link', $footerContent->youtube_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="whatsapp_link">WhatsApp Link</label>
                            <input type="url" name="whatsapp_link" id="whatsapp_link" class="form-control" value="{{ old('whatsapp_link', $footerContent->whatsapp_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="instagram_link">Instagram Link</label>
                            <input type="url" name="instagram_link" id="instagram_link" class="form-control" value="{{ old('instagram_link', $footerContent->instagram_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="telegram_link">Telegram Link</label>
                            <input type="url" name="telegram_link" id="telegram_link" class="form-control" value="{{ old('telegram_link', $footerContent->telegram_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="linkendin_link">LinkedIn Link</label>
                            <input type="url" name="linkendin_link" id="linkendin_link" class="form-control" value="{{ old('linkendin_link', $footerContent->linkendin_link) }}">
                        </div>
                        <div class="form-group">
                            <label for="boton">Button</label>
                            <input type="text" name="boton" id="boton" class="form-control" value="{{ old('boton', $footerContent->boton) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
