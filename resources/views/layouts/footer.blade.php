{{-- resources/views/layouts/footer.blade.php --}}
<div class="footer-content text-center py-4" style="background-color: #0A152F;">
    @foreach($footerContents as $footerContent)
        <div class="footer-item mb-4">
            <h4 style="color: white;">{{ $footerContent->title }}</h4>
            <p style="color: white;">{{ $footerContent->description }}</p>

            <div class="footer-links d-flex justify-content-center">
                @if($footerContent->facebook_link)
                    <a href="{{ $footerContent->facebook_link }}" target="_blank" class="mx-2">
                        <i class="fab fa-facebook" style="color: rgb(8, 102, 255); font-size: 1.5em"></i>
                    </a>
                @endif
                @if($footerContent->twitter_link)
                    <a href="{{ $footerContent->twitter_link }}" target="_blank" class="mx-2">
                        <img src="{{ asset('icons/X_red_social.svg') }}" alt="X" style="width: 1.5em; height: 1.5em;">
                    </a>
                @endif
                @if($footerContent->youtube_link)
                    <a href="{{ $footerContent->youtube_link }}" target="_blank" class="mx-2">
                        <i class="fab fa-youtube" style="color: rgb(254, 0, 0); font-size: 1.5em"></i>
                    </a>
                @endif
                @if($footerContent->whatsapp_link)
                    <a href="{{ $footerContent->whatsapp_link }}" target="_blank" class="mx-2">
                        <i class="fab fa-whatsapp" style="color: rgb(2, 193, 1); font-size: 1.5em"></i>
                    </a>
                @endif
                @if($footerContent->instagram_link)
                    <a href="{{ $footerContent->instagram_link }}" target="_blank" class="mx-2">
                        <i class="fab fa-instagram" style="color: #c32aa3; font-size: 1.5em"></i>
                    </a>
                @endif
                @if($footerContent->telegram_link)
                    <a href="{{ $footerContent->telegram_link }}" target="_blank" class="mx-2">
                        <i class="fab fa-telegram" style="color: #c32aa3; font-size: 1.5em"></i>
                    </a>
                @endif
                @if($footerContent->linkendin_link)
                    <a href="{{ $footerContent->linkendin_link }}" target="_blank" class="mx-2">
                        <i class="fab fa-linkedin" style="color: #c32aa3; font-size:1.5em"></i>
                    </a>
                @endif
            </div>
        </div>
    @endforeach
</div>
