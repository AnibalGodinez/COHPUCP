{{-- resources/views/footer_contents/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card m-7">
                <div class="card-body">
                    <h3 class="card-title text-center w-100">Add New Footer Content</h3>
                    <form action="{{ route('footer-content.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="links">Links</label>
                            <input type="text" name="links" class="form-control" id="links" value="{{ old('links') }}">
                        </div>
                        <div class="form-group">
                            <label for="facebook_link">Facebook Link</label>
                            <input type="url" name="facebook_link" class="form-control" id="facebook_link" value="{{ old('facebook_link') }}">
                        </div>
                        <div class="form-group">
                            <label for="twitter_link">Twitter Link</label>
                            <input type="url" name="twitter_link" class="form-control" id="twitter_link" value="{{ old('twitter_link') }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube_link">YouTube Link</label>
                            <input type="url" name="youtube_link" class="form-control" id="youtube_link" value="{{ old('youtube_link') }}">
                        </div>
                        <div class="form-group">
                            <label for="whatsapp_link">WhatsApp Link</label>
                            <input type="url" name="whatsapp_link" class="form-control" id="whatsapp_link" value="{{ old('whatsapp_link') }}">
                        </div>
                        <div class="form-group">
                            <label for="instagram_link">Instagram Link</label>
                            <input type="url" name="instagram_link" class="form-control" id="instagram_link" value="{{ old('instagram_link') }}">
                        </div>
                        <div class="form-group">
                            <label for="telegram_link">Telegram Link</label>
                            <input type="url" name="telegram_link" class="form-control" id="telegram_link" value="{{ old('telegram_link') }}">
                        </div>
                        <div class="form-group">
                            <label for="linkendin_link">LinkedIn Link</label>
                            <input type="url" name="linkendin_link" class="form-control" id="linkendin_link" value="{{ old('linkendin_link') }}">
                        </div>
                        <div class="form-group">
                            <label for="boton">Button</label>
                            <input type="text" name="boton" class="form-control" id="boton" value="{{ old('boton') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
