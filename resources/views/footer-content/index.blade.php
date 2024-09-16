@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title text-center" style="margin-left: 770px;">CONTENIDO DEL PIE DE PÁGINA</h3>
                            <a href="{{ route('footer-content.create') }}" class="btn btn-info btn-round btn-simple">
                                <i class="fas fa-plus-circle"></i> Crear nuevo contenido
                            </a>
                        </div><br>

                    <!-- Mensaje de éxito -->
                    @if(session('success'))
                    <div class="text-center">
                        <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem;" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-4">
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        @foreach (['ID', 'Title', 'Description', 'Links', 'Facebook', 'Twitter', 'YouTube', 'WhatsApp', 'Instagram', 'Telegram', 'LinkedIn', 'Button', 'User', 'Actions'] as $header)
                                            <th class="text-center" style="width: 120px; color: white;">{{ $header }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($footerContents as $footerContent)
                                        <tr>
                                            <td class="text-center" style="width: 120px;">{{ $footerContent->id }}</td>
                                            <td style="width: 120px;">{{ $footerContent->title }}</td>
                                            <td style="width: 120px;">{{ $footerContent->description }}</td>
                                            <td style="width: 120px;">{{ $footerContent->links }}</td>
                                            <td style="width: 120px;">
                                                <a href="{{ $footerContent->facebook_link }}" target="_blank">Facebook</a>
                                            </td>
                                            <td style="width: 120px;">
                                                <a href="{{ $footerContent->twitter_link }}" target="_blank">Twitter</a>
                                            </td>
                                            <td style="width: 120px;">
                                                <a href="{{ $footerContent->youtube_link }}" target="_blank">YouTube</a>
                                            </td>
                                            <td style="width: 120px;">
                                                <a href="{{ $footerContent->whatsapp_link }}" target="_blank">WhatsApp</a>
                                            </td>
                                            <td style="width: 120px;">
                                                <a href="{{ $footerContent->instagram_link }}" target="_blank">Instagram</a>
                                            </td>
                                            <td style="width: 120px;">
                                                <a href="{{ $footerContent->telegram_link }}" target="_blank">Telegram</a>
                                            </td>
                                            <td style="width: 120px;">
                                                <a href="{{ $footerContent->linkendin_link }}" target="_blank">LinkedIn</a>
                                            </td>
                                            <td style="width: 120px;">{{ $footerContent->boton }}</td>
                                            <td style="width: 120px;">{{ $footerContent->user->name }}</td>
                                            <td class="text-center" style="width: 120px;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
