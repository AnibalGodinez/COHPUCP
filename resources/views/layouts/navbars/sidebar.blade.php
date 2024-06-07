<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <a href="#" class="simple-text logo-normal">Menú</a>
        </div>
        <ul class="nav">
                <a href="{{ route('home') }}" class="d-flex justify-content-center">
                    <i class="tim-icons icon-bank"></i>
                    <p>{{ _('Cohpucp') }}</p>
                </a>
            </li>


            {{--========================================== Sección de Perfil ===========================================--}}
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fas fa-user"></i>
                    <span class="nav-link-text" >Perfil del Agremiado</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.index')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>Ver Perfil</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'editar') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-pin"></i>
                                <p>Personalizar perfil</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'contrasenia') class="active " @endif>
                            <a href="{{ route('cambiar-contrasenia.contrasenia')  }}">
                                <i class="tim-icons icon-refresh-02"></i>
                                <p>Cambiar contraseña</p>
                            </a>
                        </li>                        
                    </ul>
                </div>
            </li>
            {{--========================================== Sección de Personas ===========================================--}}
            <li>
                <a data-toggle="collapse" href="#personas" aria-expanded="true" aria-controls="personas">
                    <i class="fas fa-users"></i>
                    <span class="nav-link-text">Personas</span>
                    <b class="caret mt-1"></b>
                </a>
                
                <div class="collapse show" id="personas">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('usuarios.index') }}">
                                <i class="tim-icons icon-badge"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> 

            {{--================================= Sección de Plataformas Tecnológicas ===================================--}}
            <li>
                <a data-toggle="collapse" href="#plataforma" aria-expanded="true" aria-controls="plataforma">
                    <i class="fas fa-laptop"></i>
                    <span class="nav-link-text">Plataformas Tecnológicas</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="plataforma">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'cursosPlataforma') class="active " @endif>
                            <a href="{{ route('cursos.index') }}">
                                <i class="tim-icons icon-palette"></i>
                                <p>Cursos</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'capacitacionesPlataforma') class="active " @endif>
                            <a href="{{ route('capacitaciones.index') }}">
                                <i class="tim-icons icon-user-run"></i>
                                <p>Capacitaciones</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit') }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>Agendas</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit') }}">
                                <i class="tim-icons icon-link-72"></i>
                                <p>Gestiones</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit') }}">
                                <i class="tim-icons icon-tap-02"></i>
                                <p>Consultas</p>
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
                        <li @if ($pageSlug == 'roles') class="active " @endif>
                            <a href="{{ route('roles.index') }}">
                                <i class="tim-icons icon-key-25"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'permisos') class="active " @endif>
                            <a href="{{ route('permission.index') }}">
                                <i class="tim-icons icon-satisfied"></i>
                                <p>Permisos</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> 
        {{-- ======================================================================================================= --}}

            <li>
                <a data-toggle="collapse" href="#platform" aria-expanded="true" aria-controls="platform">
                    <i class="fas fa-cogs"></i>
                    <span class="nav-link-text">Mantenimientos</span>
                    <b class="caret mt-1"></b>
                </a>
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
        </ul>
    </div>
</div>
