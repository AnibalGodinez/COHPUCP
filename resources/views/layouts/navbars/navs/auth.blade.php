<nav class="navbar navbar-expand-lg" style="background-color: #0b45a1;">
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
                    <a href="{{ route('home')}}" class="nav-link text-uppercase font-weight-bold {{request()->routeIs('home') ? 'text-dark' : ''}}" >Inicio</a>
                </li>

                <li class="nav-item dropdown" style="margin-bottom: 10px;">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Perfil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase" href="{{ route('profile.show') }}">Ver mi perfil</a>
                        <a class="dropdown-item text-uppercase" href="{{ route('profile.edit') }}">Editar perfil</a>
                        <a class="dropdown-item text-uppercase" href="{{ route('profile.changePassword') }}">Cambiar contraseña</a>
                    </div>
                </li>
                
                @can('ver boton personas')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                        {{  request()->routeIs('usuarios.*') ? 'text-dark' : ''}}" 
                            href="#" 
                            id="navbarDropdown" 
                            role="button" 
                            data-toggle="dropdown"
                            aria-haspopup="true" 
                            aria-expanded="false">
                            Personas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-uppercase {{request()->routeIs('usuarios.ver') ? 'text-dark font-weight-bold' : ''}}" href="{{ route('usuarios.ver')}}">Ver usuarios</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('usuarios.create') ? 'text-dark font-weight-bold' : ''}}" href="{{ route('usuarios.create')}}">Crear usuarios</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('usuarios.index') ? 'text-dark font-weight-bold' : ''}}" href="{{ route('usuarios.index')}}">Gestionar usuarios</a>
                        </div>
                    </li>
                @endcan

                @can('ver boton roles y permisos')
                    <li class="nav-item dropdown" style="margin-bottom: 10px;">
                        <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                        {{  request()->routeIs('roles.*') || 
                            request()->routeIs('permissions.ver') || 
                            request()->routeIs('permission.*')? 'text-dark' : '' }}"
                            href="#" 
                            id="navbarDropdownRoles" 
                            role="button" 
                            data-toggle="dropdown"
                            aria-haspopup="true" 
                            aria-expanded="false">
                            Roles y permisos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownRoles">
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.*') ? 'text-dark font-weight-bold' : ''}}" id="rolesLink" href="#">Roles</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permissions.*') || request()->routeIs('permission.*')? 'text-dark font-weight-bold' : ''}}" id="permisosLink" href="#">Permisos</a>
                        </div>

                        <!-- Submenú para Roles -->
                        <div class="dropdown-menu" id="subMenuRoles" style="position: absolute; top: 0; left: 100%; display: none;">
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.ver') ? 'text-dark font-weight-bold' : ''}}" href="{{route('roles.ver')}}">Ver roles</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.create') ? 'text-dark font-weight-bold' : ''}}" href="{{route('roles.create')}}">Crear rol</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.index') ? 'text-dark font-weight-bold' : ''}}" href="{{route('roles.index')}}">Gestionar roles</a>
                        </div>
                        <!-- Submenú para Permisos -->
                        <div class="dropdown-menu" id="subMenuPermisos" style="position: absolute; top: 0; left: 100%; display: none;">
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permissions.ver') ? 'text-dark font-weight-bold' : ''}}" href="{{ route('permissions.ver')}}">Ver permisos</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permission.create') ? 'text-dark font-weight-bold' : ''}}" href="{{route('permission.create')}}">Crear permiso</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permission.index') ? 'text-dark font-weight-bold' : ''}}" href="{{ route('permission.index')}}">Gestionar permisos</a>
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
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                    {{  request()->routeIs('cursos.index') || 
                        request()->routeIs('capacitaciones.index') ? 'text-dark' : '' }}" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Desarrollo Profesional
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase {{request()->routeIs('cursos.index') ? 'text-dark font-weight-bold' : ''}}" href="{{ route('cursos.index')}}">Cursos</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('capacitaciones.index') ? 'text-dark font-weight-bold' : ''}}" href="{{ route('capacitaciones.index') }}">Capacitaciones</a>
                        <a class="dropdown-item text-uppercase" href="#">Certificaciones</a>
                        <a class="dropdown-item text-uppercase" href="#">Talleres</a>
                        <a class="dropdown-item text-uppercase" href="#">Diplomados</a>
                    </div>
                </li>

                {{-- ----------------------------------------------------------------------------------------------------------------------------------------------------- --}}

                <li class="nav-item dropdown" style="margin-bottom: 10px; position: relative;">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold" 
                       href="#" 
                       id="navbarDropdownGestiones" 
                       role="button" 
                       data-toggle="dropdown"
                       aria-haspopup="true" 
                       aria-expanded="false">
                        Gestiones
                    </a>
                
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownGestiones">
                        <a class="dropdown-item text-uppercase" id="inscribirseCohpucpLink" href="#">Inscribirse al cohpucp</a>
                        <a class="dropdown-item text-uppercase" id="solicitudesLink" href="#">Solicitudes</a>
                        <a class="dropdown-item text-uppercase" id="comprarLink" href="#">Comprar</a>
                        <a class="dropdown-item text-uppercase" id="comprarLink" href="#">Actualización de poliza de seguro de vida</a>
                    </div>
                
                    <!-- Submenú para Solicitudes -->
                    <div class="dropdown-menu" id="subMenuSolicitudes" style="position: absolute; top: 100%; left: 100%; margin-left: 209px; display: none; z-index: 1000;">
                        <a class="dropdown-item text-uppercase" id="solicitudConstanciasLink" href="#">Solicitud de constancias</a>
                        <a class="dropdown-item text-uppercase" href="#">Solicitud de estado de cuenta</a>
                        <a class="dropdown-item text-uppercase" href="#">Solicitud de plan de pago</a>
                    </div>
                
                    <!-- Submenú para Solicitud de constancias -->
                    <div class="dropdown-menu" id="subMenuConstancias" style="position: absolute; top: 0; left: 100%; margin-left: 454px; display: none; z-index: 1000;">
                        <a class="dropdown-item text-uppercase" href="#">Constancia de Solvencia</a>
                        <a class="dropdown-item text-uppercase" href="#">Constancia de ética</a>
                    </div>
                
                    <!-- Submenú para Inscribirse al cohpucp -->
                    <div class="dropdown-menu" id="subMenuInscribirseCohpucp" style="position: absolute; top: 100%; left: 100%; margin-left: 209px; display: none; z-index: 1000;">
                        <a class="dropdown-item text-uppercase" href="#">Inscripción de firma de Auditoría</a>
                        <a class="dropdown-item text-uppercase" href="#">Inscripción de agremiado</a>
                    </div>
                
                    <!-- Submenú para Comprar -->
                    <div class="dropdown-menu" id="subMenuComprar" style="position: absolute; top: 100%; left: 100%; margin-left: 120px; display: none; z-index: 1000;">
                        <a class="dropdown-item text-uppercase" id="sellosLink" href="#">Sellos</a>
                        <a class="dropdown-item text-uppercase" id="timbresLink" href="#">Timbres</a>
                    </div>
                
                    <!-- Submenú para Sellos -->
                    <div class="dropdown-menu" id="subMenuSellos" style="position: absolute; top: 0; left: 100%; margin-left: 208px; display: none; z-index: 1000;">
                        <a class="dropdown-item text-uppercase" href="#">Sellos de bolsillo</a>
                        <a class="dropdown-item text-uppercase" href="#">Sellos automáticos</a>
                    </div>
                </li>
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    // Obtener los elementos del DOM
                    const navbarDropdownGestiones = document.getElementById('navbarDropdownGestiones');
                    const subMenuSolicitudes = document.getElementById('subMenuSolicitudes');
                    const subMenuConstancias = document.getElementById('subMenuConstancias');
                    const subMenuInscribirseCohpucp = document.getElementById('subMenuInscribirseCohpucp');
                    const subMenuComprar = document.getElementById('subMenuComprar');
                    const subMenuSellos = document.getElementById('subMenuSellos');
                    const inscribirseCohpucpLink = document.getElementById('inscribirseCohpucpLink');
                    const solicitudesLink = document.getElementById('solicitudesLink');
                    const compraLink = document.getElementById('comprarLink');
                    const solicitudConstanciasLink = document.getElementById('solicitudConstanciasLink');
                    const sellosLink = document.getElementById('sellosLink');
                    
                    // Función para mostrar el submenú de Solicitudes
                    const showSubMenuSolicitudes = () => {
                        subMenuSolicitudes.style.display = 'block';
                        subMenuInscribirseCohpucp.style.display = 'none';
                        subMenuComprar.style.display = 'none';
                    };

                    // Función para ocultar el submenú de Solicitudes
                    const hideSubMenuSolicitudes = () => {
                        subMenuSolicitudes.style.display = 'none';
                        subMenuConstancias.style.display = 'none';
                    };

                    // Función para mostrar el submenú de Solicitud de constancias
                    const showSubMenuConstancias = () => {
                        subMenuConstancias.style.display = 'block';
                    };

                    // Función para ocultar el submenú de Solicitud de constancias
                    const hideSubMenuConstancias = () => {
                        subMenuConstancias.style.display = 'none';
                    };

                    // Función para mostrar el submenú de Inscribirse al cohpucp
                    const showSubMenuInscribirseCohpucp = () => {
                        subMenuInscribirseCohpucp.style.display = 'block';
                        subMenuSolicitudes.style.display = 'none';
                        subMenuComprar.style.display = 'none';
                    };

                    // Función para ocultar el submenú de Inscribirse al cohpucp
                    const hideSubMenuInscribirseCohpucp = () => {
                        subMenuInscribirseCohpucp.style.display = 'none';
                    };

                    // Función para mostrar el submenú de Comprar
                    const showSubMenuComprar = () => {
                        subMenuComprar.style.display = 'block';
                        subMenuInscribirseCohpucp.style.display = 'none';
                        subMenuSolicitudes.style.display = 'none';
                    };

                    // Función para ocultar el submenú de Comprar
                    const hideSubMenuComprar = () => {
                        subMenuComprar.style.display = 'none';
                        subMenuSellos.style.display = 'none';
                    };

                    // Función para mostrar el submenú de Sellos
                    const showSubMenuSellos = () => {
                        subMenuSellos.style.display = 'block';
                    };

                    // Función para ocultar el submenú de Sellos
                    const hideSubMenuSellos = () => {
                        subMenuSellos.style.display = 'none';
                    };

                    // Mostrar el submenú de Inscribirse al Cohpucp cuando el cursor está sobre el enlace correspondiente
                    inscribirseCohpucpLink.addEventListener('mouseenter', showSubMenuInscribirseCohpucp);

                    // Mostrar el submenú de Solicitudes cuando el cursor está sobre el enlace correspondiente
                    solicitudesLink.addEventListener('mouseenter', showSubMenuSolicitudes);

                    // Mostrar el submenú de Comprar cuando el cursor está sobre el enlace correspondiente
                    compraLink.addEventListener('mouseenter', showSubMenuComprar);

                    // Mostrar el submenú de Solicitud de constancias cuando el cursor está sobre el enlace correspondiente
                    solicitudConstanciasLink.addEventListener('mouseenter', showSubMenuConstancias);

                    // Mantener visible el submenú de Solicitudes mientras el cursor esté sobre él
                    subMenuSolicitudes.addEventListener('mouseenter', showSubMenuSolicitudes);

                    // Ocultar el submenú de Solicitudes cuando el cursor salga de él
                    subMenuSolicitudes.addEventListener('mouseleave', hideSubMenuSolicitudes);

                    // Mantener visible el submenú de Solicitud de constancias mientras el cursor esté sobre él
                    subMenuConstancias.addEventListener('mouseenter', showSubMenuConstancias);

                    // Ocultar el submenú de Solicitud de constancias cuando el cursor salga de él
                    subMenuConstancias.addEventListener('mouseleave', hideSubMenuConstancias);

                    // Mostrar el submenú de Solicitudes mientras el cursor esté sobre el submenú de constancias
                    subMenuConstancias.addEventListener('mouseenter', showSubMenuSolicitudes);

                    // Mantener visible el submenú de Comprar mientras el cursor esté sobre él
                    subMenuComprar.addEventListener('mouseenter', showSubMenuComprar);

                    // Ocultar el submenú de Comprar cuando el cursor salga de él
                    subMenuComprar.addEventListener('mouseleave', hideSubMenuComprar);

                    // Mostrar el submenú de Sellos mientras el cursor esté sobre el enlace correspondiente
                    sellosLink.addEventListener('mouseenter', showSubMenuSellos);

                    // Ocultar el submenú de Sellos cuando el cursor salga de él
                    subMenuSellos.addEventListener('mouseleave', hideSubMenuSellos);

                    // Ocultar los submenús cuando el cursor no esté sobre "Gestiones" o sus submenús
                    navbarDropdownGestiones.addEventListener('mouseleave', function() {
                        hideSubMenuSolicitudes();
                        hideSubMenuInscribirseCohpucp();
                        hideSubMenuConstancias();
                        hideSubMenuComprar();
                        hideSubMenuSellos();
                    });
                });
                </script>
                
                {{-- ----------------------------------------------------------------------------------------------------------------------------------------------------- --}}

                <li class="nav-item dropdown" style="margin-bottom: 10px;">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Eventos sociales
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase" href="#">Día del Padre</a>
                        <a class="dropdown-item text-uppercase" href="#">Día de la Madre </a>
                        <a class="dropdown-item text-uppercase" href="#">Fiesta del contador</a>
                        <a class="dropdown-item text-uppercase" href="#">Cena navideña</a>
                        <a class="dropdown-item text-uppercase" href="#">Otros eventos</a>
                    </div>
                </li>

                <li class="nav-item dropdown" style="margin-bottom: 10px;">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Pagos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase" href='#'>Pagos 1</a>
                        <a class="dropdown-item text-uppercase" href='#'>Pagos 2</a>
                    </div>
                </li>
            
                <li class="nav-item dropdown" style="margin-bottom: 10px;">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Bolsa de empleos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase" href='#'>Vacantes</a>
                        <a class="dropdown-item text-uppercase" href='#'>Perfiles de Agremiados</a>
                    </div>
                </li>
     
                @can('ver boton mantenimientos')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                    {{  request()->routeIs('security_questions.index') || 
                        request()->routeIs('pais.index') ||
                        request()->routeIs('welcome-content.index')? 'text-dark' : '' }}" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Mantenimientos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase {{request()->routeIs('security_questions.index') ? 'text-dark font-weight-bold' : ''}}" href="{{ route('security_questions.index')}}">Preguntas de seguridad</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('pais.index') ? 'text-dark font-weight-bold' : ''}}" href="{{ route('pais.index') }}">Países</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('welcome-content.index') ? 'text-dark font-weight-bold' : ''}}" href="{{ route('welcome-content.index') }}">Inicio</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('welcome-content.index') ? 'text-dark font-weight-bold' : ''}}" href="{{ route('welcome-content.index') }}">Home</a> 
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
                            <a href="{{ route('profile.show') }}" class="nav-link" style="color: black;">Perfil</a>
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
