<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('▚') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('Menú') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Cohpucp') }}</p>
                </a>
            </li>

            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Perfil') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Perfil de usuario') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Cambiar contraseña') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

{{-- ======================================================================================================= --}}
{{-- Se agregó el módulo de seguridad --}}
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fas fa-shield-alt"></i>
                    <span class="nav-link-text" >{{ __('Seguridad') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">

                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-key-25"></i>
                                <p>{{ _('Roles y permisos') }}</p>
                            </a>
                        </li>

                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-lock-circle"></i>
                                <p>{{ _('Gestión de roles') }}</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
{{-- ======================================================================================================= --}}


{{-- ======================================================================================================= --}}
{{-- Se agregó el módulo de Plataformas Tecnológicas --}}
<li>
    <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
        <i class="fas fa-laptop"></i>

        <span class="nav-link-text" >{{ __('Plataformas Tecnológicas') }}</span>
        <b class="caret mt-1"></b>
    </a>
    <div class="collapse show" id="laravel-examples">
        <ul class="nav pl-4">

            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-user-run"></i>
                    <p>{{ _('Cursos y capacitaciones') }}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-notes"></i>
                    <p>{{ _('Agendas') }}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-link-72"></i>
                    <p>{{ _('Gestiones') }}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-tap-02"></i>
                    <p>{{ _('Consultas') }}</p>
                </a>
            </li>

        </ul>
    </div>
</li>
{{-- ======================================================================================================= --}}



            <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Iconos') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-globe-2"></i>
                    <p>{{ _('Ubicación') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ _('Notificationes') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ _('Lista de tablas') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ _('Tipografía') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ _('Soporte RTL') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ _('Actualízate a PRO') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
