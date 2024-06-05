<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('▚') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('Menú') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-bank"></i>
                    <p>{{ _('Cohpucp') }}</p>
                </a>
            </li>


{{--========================================== Sección de Perfil ===========================================--}}
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fas fa-user"></i>
                    <span class="nav-link-text" >Perfil</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>Perfil de usuario</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-refresh-02"></i>
                                <p>Cambiar contraseña</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-pin"></i>
                                <p>Personalizar perfil</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


{{--========================================== Sección de Seguridad ===========================================--}}
            <li>
                <a data-toggle="collapse" href="#security" aria-expanded="true" aria-controls="security">
                    <i class="fas fa-shield-alt"></i>
                    <span class="nav-link-text">Seguridad</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="security">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'usuarios') class="active " @endif>
                            <a href="{{ route('seguridad.usuarios') }}">
                                <i class="tim-icons icon-satisfied"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'roles_permisos') class="active " @endif>
                            <a href="{{ route('seguridad.roles_permisos') }}">
                                <i class="tim-icons icon-key-25"></i>
                                <p>Roles y permisos</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'gestion_roles') class="active " @endif>
                            <a href="{{ route('seguridad.gestion_roles') }}">
                                <i class="tim-icons icon-lock-circle"></i>
                                <p>Gestión de roles</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> 
{{-- ======================================================================================================= --}}



{{--================================= Sección de Plataformas Tecnológicas ===================================--}}
            <li>
                <a data-toggle="collapse" href="#platform" aria-expanded="true" aria-controls="platform">
                    <i class="fas fa-laptop"></i>
                    <span class="nav-link-text">Plataformas Tecnológicas</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="platform">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'cursos') class="active " @endif>
                            <a href="{{ route('plataforma.cursos') }}">
                                <i class="tim-icons icon-palette"></i>
                                <p>Cursos</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'capacitaciones') class="active " @endif>
                            <a href="{{ route('plataforma.capacitaciones') }}">
                                <i class="tim-icons icon-user-run"></i>
                                <p>Capacitaciones</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'agendas') class="active " @endif>
                            <a href="{{ route('plataforma.agendas') }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>Agendas</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'gestiones') class="active " @endif>
                            <a href="{{ route('plataforma.gestiones') }}">
                                <i class="tim-icons icon-link-72"></i>
                                <p>Gestiones</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'consultas') class="active " @endif>
                            <a href="{{ route('plataforma.consultas') }}">
                                <i class="tim-icons icon-tap-02"></i>
                                <p>Consultas</p>
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
