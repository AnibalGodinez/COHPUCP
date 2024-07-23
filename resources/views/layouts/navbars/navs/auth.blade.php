<nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('home')}}" class="nav-link text-uppercase font-weight-bold {{request()->routeIs('home') ? 'text-default' : ''}}" >Inicio</a>
                </li>

                <li class="nav-item dropdown" style="margin-bottom: 10px;">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                    {{  request()->routeIs('profile.*') || 
                        request()->routeIs('cambiar-contrasenia.contrasenia') ? 'text-default' : '' }}" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Perfil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase {{ request()->routeIs('profile.index') ? 'text-default font-weight-bold' : '' }}" href="{{ route('profile.index') }}">Ver mi perfil</a>
                        <a class="dropdown-item text-uppercase {{ request()->routeIs('profile.edit') ? 'text-default font-weight-bold' : '' }}" href="{{ route('profile.edit') }}">Actualizar perfil</a>
                        <a class="dropdown-item text-uppercase {{ request()->routeIs('cambiar-contrasenia.contrasenia') ? 'text-default font-weight-bold' : '' }}" href="{{ route('cambiar-contrasenia.contrasenia') }}">Cambiar contraseña</a>
                    </div>
                </li>
                

                @can('ver boton personas')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                        {{  request()->routeIs('usuarios.*') ? 'text-default' : ''}}" 
                            href="#" 
                            id="navbarDropdown" 
                            role="button" 
                            data-toggle="dropdown"
                            aria-haspopup="true" 
                            aria-expanded="false">
                            Personas
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item text-uppercase {{request()->routeIs('usuarios.ver') ? 'text-default font-weight-bold' : ''}}" href="{{ route('usuarios.ver')}}">Ver usuarios</a>

                            <a class="dropdown-item text-uppercase {{request()->routeIs('usuarios.create') ? 'text-default font-weight-bold' : ''}}" href="{{ route('usuarios.create')}}">Crear usuarios</a>

                            <a class="dropdown-item text-uppercase {{request()->routeIs('usuarios.index') ? 'text-default font-weight-bold' : ''}}" href="{{ route('usuarios.index')}}">Gestionar usuarios</a>

                        </div>

                    </li>
                @endcan

                @can('ver boton roles y permisos')
                    <li class="nav-item dropdown" style="margin-bottom: 10px;">
                        <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                        {{  request()->routeIs('roles.*') || 
                            request()->routeIs('permissions.ver') || 
                            request()->routeIs('permission.*')? 'text-default' : '' }}"
                            href="#" id="navbarDropdownRoles" 
                            role="button" 
                            data-toggle="dropdown"
                            aria-haspopup="true" 
                            aria-expanded="false">
                            Roles y permisos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownRoles">
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.*') ? 'text-default font-weight-bold' : ''}}" id="rolesLink" href="#">Roles</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permissions.*') || request()->routeIs('permission.*')? 'text-default font-weight-bold' : ''}}" id="permisosLink" href="#">Permisos</a>
                        </div>
                        <!-- Submenú para Roles -->
                        <div class="dropdown-menu" id="subMenuRoles" style="position: absolute; top: 0; left: 100%; display: none;">
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.ver') ? 'text-default font-weight-bold' : ''}}" href="{{route('roles.ver')}}">Ver roles</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.create') ? 'text-default font-weight-bold' : ''}}" href="{{route('roles.create')}}">Crear rol</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.index') ? 'text-default font-weight-bold' : ''}}" href="{{route('roles.index')}}">Gestionar roles</a>
                        </div>
                        <!-- Submenú para Permisos -->
                        <div class="dropdown-menu" id="subMenuPermisos" style="position: absolute; top: 0; left: 100%; display: none;">
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permissions.ver') ? 'text-default font-weight-bold' : ''}}" href="{{ route('permissions.ver')}}">Ver permisos</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permission.create') ? 'text-default font-weight-bold' : ''}}" href="{{route('permission.create')}}">Crear permiso</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permission.index') ? 'text-default font-weight-bold' : ''}}" href="{{ route('permission.index')}}">Gestionar permisos</a>
                        </div>
                    </li>
                @endcan

                <script>
                    // Obtener los elementos del DOM
                    const navbarDropdownRoles = document.getElementById('navbarDropdownRoles');
                    const subMenuRoles = document.getElementById('subMenuRoles');
                    const subMenuPermisos = document.getElementById('subMenuPermisos');
                    const rolesLink = document.getElementById('rolesLink');
                    const permisosLink = document.getElementById('permisosLink');
                
                    // Función para mostrar el submenú de Roles
                    const showSubMenuRoles = () => {
                        subMenuRoles.style.display = 'block';
                        subMenuPermisos.style.display = 'none';
                    };
                
                    // Función para mostrar el submenú de Permisos
                    const showSubMenuPermisos = () => {
                        subMenuPermisos.style.display = 'block';
                        subMenuRoles.style.display = 'none';
                    };
                
                    // Función para ocultar los submenús
                    const hideSubMenus = () => {
                        subMenuRoles.style.display = 'none';
                        subMenuPermisos.style.display = 'none';
                    };
                
                    // Mostrar el submenú de Roles cuando el cursor está sobre el enlace de Roles
                    rolesLink.addEventListener('mouseenter', showSubMenuRoles);
                
                    // Mostrar el submenú de Permisos cuando el cursor está sobre el enlace de Permisos
                    permisosLink.addEventListener('mouseenter', showSubMenuPermisos);
                
                    // Mantener visible el submenú de Roles mientras el cursor esté sobre él
                    subMenuRoles.addEventListener('mouseenter', showSubMenuRoles);
                
                    // Ocultar el submenú de Roles cuando el cursor salga de él
                    subMenuRoles.addEventListener('mouseleave', hideSubMenus);
                
                    // Mantener visible el submenú de Permisos mientras el cursor esté sobre él
                    subMenuPermisos.addEventListener('mouseenter', showSubMenuPermisos);
                
                    // Ocultar el submenú de Permisos cuando el cursor salga de él
                    subMenuPermisos.addEventListener('mouseleave', hideSubMenus);
                
                    // Ocultar los submenús cuando el cursor no esté sobre "Roles y permisos", "Roles" o "Permisos"
                    navbarDropdownRoles.addEventListener('mouseleave', hideSubMenus);
                </script>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Gestiones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase" href="#">Compra de timbres</a>
                        <a class="dropdown-item text-uppercase" href="#">Inscribirse al colegio</a>
                        <a class="dropdown-item text-uppercase" href="#">Estado de cuenta</a>
                        <a class="dropdown-item text-uppercase" href="#">Consultas</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                    {{  request()->routeIs('cursos.index') || 
                        request()->routeIs('capacitaciones.index') ? 'text-default' : '' }}" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Desarrollo Profesional
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase {{request()->routeIs('cursos.index') ? 'text-default font-weight-bold' : ''}}" href="{{ route('cursos.index')}}">Cursos</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('capacitaciones.index') ? 'text-default font-weight-bold' : ''}}" href="{{ route('capacitaciones.index') }}">Capacitaciones</a>
                        <a class="dropdown-item text-uppercase" href="#">Certificaciones</a>
                        <a class="dropdown-item text-uppercase" href="#">Talleres</a>
                    </div>
                </li>
            

                <li class="nav-item">
                    <a class="nav-link text-uppercase font-weight-bold" href="#">Bolsa de empleo</a>
                </li>

                @can('ver boton de invitado')
                <li class="nav-item">
                    <a class="nav-link text-uppercase font-weight-bold" href="#">Botón de invitado</a>
                </li>
                @endcan


                @can('ver boton de agremiado')
                <li class="nav-item">
                    <a class="nav-link text-uppercase font-weight-bold" href="#">Botón de agremiado</a>
                </li>
                @endcan

                
                @can('ver boton mantenimientos')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                    {{  request()->routeIs('security_questions.index') || 
                        request()->routeIs('pais.index') ||
                        request()->routeIs('welcome-content.index')? 'text-default' : '' }}" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Mantenimientos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase {{request()->routeIs('security_questions.index') ? 'text-default font-weight-bold' : ''}}" href="{{ route('security_questions.index')}}">Preguntas de seguridad</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('pais.index') ? 'text-default font-weight-bold' : ''}}" href="{{ route('pais.index') }}">Países</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('welcome-content.index') ? 'text-default font-weight-bold' : ''}}" href="{{ route('welcome-content.index') }}">Gestionar vista welcome</a> 
                    </div>
                </li>                
                @endcan

                @can('ver boton notificaciones')
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="tim-icons icon-bell-55"></i>
                            <p class="d-lg-none text-uppercase"> Notificationes </p>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                            <li class="dropdown-item text-uppercase">
                                <a href="#" class="nav-link" style="color: black;">Mike Jonh responded to your email</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                            <img src="{{ asset('white') }}/img/anime3.png" alt="Profile photo">
                        </div>
                        <p class="d-lg-none"> Botón de usuario </p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="dropdown-item text-uppercase">
                            <a href="{{ route('profile.index') }}" class="nav-link" style="color: black;">Perfil</a>
                        </li>
                        <li class="dropdown-item text-uppercase">
                            <a href="#" class="nav-link" style="color: black;">Ajustes</a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item">
                            <a href="{{ route('logout') }}" class="nav-link text-uppercase"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: black;">Cerrar sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
