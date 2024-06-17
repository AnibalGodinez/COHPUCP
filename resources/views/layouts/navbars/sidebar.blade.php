<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <a href="#" class="simple-text logo-normal">Menú</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('home') }}" class="d-flex justify-content-center">
                    <i class="tim-icons icon-bank"></i>
                    <p>Cohpucp</p>
                </a>
            </li>

            {{-- Perfil del Agremiado --}}
            <li>
                <a data-toggle="collapse" href="#perfil-agremiado" aria-expanded="{{ $pageSlug == 'profile' || $pageSlug == 'editar' || $pageSlug == 'contrasenia' ? 'true' : 'false' }}">
                    <i class="fas fa-user"></i>
                    <span class="nav-link-text">Perfil del Agremiado</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse {{ $pageSlug == 'profile' || $pageSlug == 'editar' || $pageSlug == 'contrasenia' ? 'show' : '' }}" id="perfil-agremiado">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active" @endif>
                            <a href="{{ route('profile.index') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>Ver Perfil</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'editar') class="active" @endif>
                            <a href="{{ route('profile.edit') }}">
                                <i class="tim-icons icon-pin"></i>
                                <p>Personalizar perfil</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'contrasenia') class="active" @endif>
                            <a href="{{ route('cambiar-contrasenia.contrasenia') }}">
                                <i class="tim-icons icon-refresh-02"></i>
                                <p>Cambiar contraseña</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Plataformas Tecnológicas --}}
            <li>
                <a data-toggle="collapse" href="#plataformas" aria-expanded="{{ $pageSlug == 'cursosPlataforma' || $pageSlug == 'capacitacionesPlataforma' || $pageSlug == 'agendaPlataforma' || $pageSlug == 'gestionesPlataforma' || $pageSlug == 'consultasPlataforma' ? 'true' : 'false' }}">
                    <i class="fas fa-laptop"></i>
                    <span class="nav-link-text">Plataformas Tecnológicas</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse {{ $pageSlug == 'cursosPlataforma' || $pageSlug == 'capacitacionesPlataforma' || $pageSlug == 'agendaPlataforma' || $pageSlug == 'gestionesPlataforma' || $pageSlug == 'consultasPlataforma' ? 'show' : '' }}" id="plataformas">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'cursosPlataforma') class="active" @endif>
                            <a href="{{ route('cursos.index') }}">
                                <i class="tim-icons icon-palette"></i>
                                <p>Cursos</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'capacitacionesPlataforma') class="active" @endif>
                            <a href="{{ route('capacitaciones.index') }}">
                                <i class="tim-icons icon-user-run"></i>
                                <p>Capacitaciones</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'agendaPlataforma') class="active" @endif>
                            <a href="{{ route('pages.icons') }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>Agendas</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'gestionesPlataforma') class="active" @endif>
                            <a href="{{ route('pages.icons') }}">
                                <i class="tim-icons icon-link-72"></i>
                                <p>Gestiones</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'consultasPlataforma') class="active" @endif>
                            <a href="{{ route('pages.icons') }}">
                                <i class="tim-icons icon-tap-02"></i>
                                <p>Consultas</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Seguridad --}}
            <li>
                <a data-toggle="collapse" href="#seguridad" aria-expanded="{{ $pageSlug == 'seguridadUsuarios' || $pageSlug == 'seguridadRoles' || $pageSlug == 'seguridadPermisos' ? 'true' : 'false' }}">
                    <i class="fas fa-shield-alt"></i>
                    <span class="nav-link-text">Seguridad</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse {{ $pageSlug == 'seguridadUsuarios' || $pageSlug == 'seguridadRoles' || $pageSlug == 'seguridadPermisos' ? 'show' : '' }}" id="seguridad">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'seguridadUsuarios') class="active" @endif>
                            <a href="{{ route('seguridad.usuarios') }}">
                                <i class="fas fa-users"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'seguridadRoles') class="active" @endif>
                            <a href="{{ route('seguridad.roles') }}">
                                <i class="tim-icons icon-pin"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'seguridadPermisos') class="active" @endif>
                            <a href="{{ route('seguridad.permisos') }}">
                                <i class="tim-icons icon-refresh-02"></i>
                                <p>Permisos</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Mantenimientos --}}
            <li>
                <a data-toggle="collapse" href="#mantenimiento" aria-expanded="{{ $pageSlug == 'mantenimientoUsuarios' || $pageSlug == 'mantenimientoRoles' || $pageSlug == 'mantenimientoPermisos' ? 'true' : 'false' }}">
                    <i class="fas fa-cogs"></i>
                    <span class="nav-link-text">Mantenimientos</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse {{ $pageSlug == 'mantenimientoUsuarios' || $pageSlug == 'mantenimientoRoles' || $pageSlug == 'mantenimientoPermisos' ? 'show' : '' }}" id="mantenimiento">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'mantenimientoUsuarios' || $pageSlug == 'usuarios') class="active" @endif>
                            <a href="{{ route('usuarios.index') }}">
                                <i class="tim-icons icon-badge"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'mantenimientoRoles') class="active" @endif>
                            <a href="{{ route('roles.index') }}">
                                <i class="tim-icons icon-key-25"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'mantenimientoPermisos') class="active" @endif>
                            <a href="{{ route('permission.index') }}">
                                <i class="tim-icons icon-satisfied"></i>
                                <p>Permisos</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Iconos --}}
            <li @if ($pageSlug == 'icons') class="active" @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>Iconos</p>
                </a>
            </li>
        </ul>
    </div>
</div>
