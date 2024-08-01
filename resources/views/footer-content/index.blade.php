
{{-- resources/views/footer_contents/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Footer Contents</h1>
    <a href="{{ route('footer-content.create') }}" class="btn btn-primary">Add New Footer Content</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Facebook Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($footerContents as $footerContent)
                <tr>
                    <td>{{ $footerContent->id }}</td>
                    <td>{{ $footerContent->title }}</td>
                    <td>{{ $footerContent->description }}</td>
                    <td><a href="{{ $footerContent->facebook_link }}" target="_blank">Facebook</a></td>
                    <td>
                        <a href="{{ route('footer-content.edit', $footerContent->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('footer-content.destroy', $footerContent->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
