<footer class="footer">
    <div class="container-fluid">
        <ul class="nav">
            <li class="nav-item">
                <a href="https://www.cohpucphn.org" target="blank" class="nav-link">
                    {{ _('COHPUCP') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" target="blank" class="nav-link">
                    {{ _('Contacto') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    {{ _('Sobre nosotros') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    {{ _('Blog') }}
                </a>
            </li>
        </ul>
        <div class="copyright">
            &copy; {{ now()->year }} {{ _('Elaborado por') }} 
            <a href="#" target="_blank">{{ _('Anibal Godinez') }}</a> {{ _('y') }}
            <a href="https://www.cohpucphn.org" target="_blank">{{ _('COHPUCP') }}</a> {{ _('todos los derechos reservados') }}.
        </div>
    </div>
</footer>
