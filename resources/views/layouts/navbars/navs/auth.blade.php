<nav class="navbar navbar-expand-lg" style="background-color: #0A152F; position: fixed; width: 100%; top: 0; left: 0; z-index: 1000; border-bottom: 1px solid #424141;">
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
                    <a href="{{ route('home')}}" class="nav-link text-uppercase font-weight-bold {{request()->routeIs('home') ? 'text-warning' : ''}}" >Inicio</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                    {{  request()->routeIs('profile.*') ? 'text-warning' : ''}}" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Perfil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase {{request()->routeIs('profile.show') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('profile.show') }}">Ver mi perfil</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('profile.edit') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('profile.edit') }}">Editar perfil</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('profile.changePassword') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('profile.changePassword') }}">Cambiar contraseña</a>
                    </div>
                </li>
                
                @can('ver boton personas')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                        {{  request()->routeIs('usuarios.*') ? 'text-warning' : ''}}" 
                            href="#" 
                            id="navbarDropdown" 
                            role="button" 
                            data-toggle="dropdown"
                            aria-haspopup="true" 
                            aria-expanded="false">
                            Personas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-uppercase {{request()->routeIs('usuarios.ver') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('usuarios.ver')}}">Ver usuarios</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('usuarios.create') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('usuarios.create')}}">Crear usuarios</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('usuarios.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('usuarios.index')}}">Gestionar usuarios</a>
                        </div>
                    </li>
                @endcan

                @can('ver boton roles y permisos')
                    <li class="nav-item dropdown" style="margin-bottom: 10px;">
                        <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                        {{  request()->routeIs('roles.*') || 
                            request()->routeIs('permissions.ver') || 
                            request()->routeIs('permission.*')? 'text-warning' : '' }}"
                            href="#" 
                            id="navbarDropdownRoles" 
                            role="button" 
                            data-toggle="dropdown"
                            aria-haspopup="true" 
                            aria-expanded="false">
                            Roles y permisos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownRoles">
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.*') ? 'text-warning font-weight-bold' : ''}}" id="rolesLink" href="#">Roles</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permissions.*') || request()->routeIs('permission.*')? 'text-warning font-weight-bold' : ''}}" id="permisosLink" href="#">Permisos</a>
                        </div>

                        <!-- Submenú para Roles -->
                        <div class="dropdown-menu" id="subMenuRoles" style="position: absolute; top: 0; left: 100%; display: none;">
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.ver') ? 'text-warning font-weight-bold' : ''}}" href="{{route('roles.ver')}}">Ver roles</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.create') ? 'text-warning font-weight-bold' : ''}}" href="{{route('roles.create')}}">Crear rol</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('roles.index') ? 'text-warning font-weight-bold' : ''}}" href="{{route('roles.index')}}">Gestionar roles</a>
                        </div>
                        <!-- Submenú para Permisos -->
                        <div class="dropdown-menu" id="subMenuPermisos" style="position: absolute; top: 0; left: 100%; display: none; margin-top:44px">
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permissions.ver') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('permissions.ver')}}">Ver permisos</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permission.create') ? 'text-warning font-weight-bold' : ''}}" href="{{route('permission.create')}}">Crear permiso</a>
                            <a class="dropdown-item text-uppercase {{request()->routeIs('permission.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('permission.index')}}">Gestionar permisos</a>
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
                    {{ request()->routeIs('cursos.*') || 
                        request()->routeIs('capacitaciones.index') ? 'text-warning' : '' }}" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Desarrollo Profesional
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase {{request()->routeIs('cursos.view') ? 'text-warning font-weight-bold' : ''}}" 
                        id="cursosLink" href="{{ route('cursos.view') }}">Cursos</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('capacitaciones.index') ? 'text-warning font-weight-bold' : ''}}" 
                        id="capacitacionesLink" href="{{ route('capacitaciones.index') }}">Capacitaciones</a>
                        <a class="dropdown-item text-uppercase" id="certificacionesLink" href="#">Certificaciones</a>
                        <a class="dropdown-item text-uppercase" id="talleresLink" href="#">Talleres</a>
                        <a class="dropdown-item text-uppercase" id="diplomadosLink" href="#">Diplomados</a>
                    </div>

                    <!-- Submenú para Cursos -->
                    <div class="dropdown-menu" id="subMenuCursos" style="position: absolute; top: 0; left: 100%; display: none; margin-left:-59px">
                        <a class="dropdown-item text-uppercase {{request()->routeIs('cursos.ver') ? 'text-warning font-weight-bold' : ''}}" 
                        href="{{ route('cursos.view') }}">Ver cursos</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('cursos.create') ? 'text-warning font-weight-bold' : ''}}" 
                        href="{{ route('cursos.create') }}">Crear curso</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('cursos.index') ? 'text-warning font-weight-bold' : ''}}" 
                        href="{{ route('cursos.index') }}">Gestionar cursos</a>
                    </div>

                    <!-- Submenú para Capacitaciones -->
                    <div class="dropdown-menu" id="subMenuCapacitaciones" style="position: absolute; top: 0; left: 100%; display: none; margin-left:-59px; margin-top:45px">
                        <a class="dropdown-item text-uppercase" href="#">Ver capacitaciones</a>
                        <a class="dropdown-item text-uppercase" href="#">Crear capacitación</a>
                        <a class="dropdown-item text-uppercase" href="#">Gestionar capacitaciones</a>
                    </div>

                    <!-- Submenú para Certificaciones -->
                    <div class="dropdown-menu" id="subMenuCertificaciones" style="position: absolute; top: 0; left: 100%; display: none; margin-left:-59px; margin-top:85px">
                        <a class="dropdown-item text-uppercase" href="#">Ver certificaciones</a>
                        <a class="dropdown-item text-uppercase" href="#">Crear certificación</a>
                        <a class="dropdown-item text-uppercase" href="#">Gestionar certificaciones</a>
                    </div>

                    <!-- Submenú para Talleres -->
                    <div class="dropdown-menu" id="subMenuTalleres" style="position: absolute; top: 0; left: 100%; display: none; margin-left:-59px; margin-top:128px">
                        <a class="dropdown-item text-uppercase" href="#">Ver talleres</a>
                        <a class="dropdown-item text-uppercase" href="#">Crear taller</a>
                        <a class="dropdown-item text-uppercase" href="#">Gestionar talleres</a>
                    </div>

                    <!-- Submenú para Diplomados -->
                    <div class="dropdown-menu" id="subMenuDiplomados" style="position: absolute; top: 0; left: 100%; display: none; margin-left:-59px; margin-top:170px">
                        <a class="dropdown-item text-uppercase" href="#">Ver diplomados</a>
                        <a class="dropdown-item text-uppercase" href="#">Crear diplomado</a>
                        <a class="dropdown-item text-uppercase" href="#">Gestionar diplomados</a>
                    </div>
                </li>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Obtener los elementos del DOM
                        const cursosLink = document.getElementById('cursosLink');
                        const subMenuCursos = document.getElementById('subMenuCursos');
                        const capacitacionesLink = document.getElementById('capacitacionesLink');
                        const subMenuCapacitaciones = document.getElementById('subMenuCapacitaciones');
                        const certificacionesLink = document.getElementById('certificacionesLink');
                        const subMenuCertificaciones = document.getElementById('subMenuCertificaciones');
                        const talleresLink = document.getElementById('talleresLink');
                        const subMenuTalleres = document.getElementById('subMenuTalleres');
                        const diplomadosLink = document.getElementById('diplomadosLink');
                        const subMenuDiplomados = document.getElementById('subMenuDiplomados');
                        const navbarDropdown = document.getElementById('navbarDropdown');

                        // Función para mostrar el submenú
                        const showSubMenu = (subMenu) => {
                            hideSubMenus(); // Ocultar otros submenús antes de mostrar el actual
                            subMenu.style.display = 'block';
                        };

                        // Función para ocultar los submenús
                        const hideSubMenus = () => {
                            subMenuCursos.style.display = 'none';
                            subMenuCapacitaciones.style.display = 'none';
                            subMenuCertificaciones.style.display = 'none';
                            subMenuTalleres.style.display = 'none';
                            subMenuDiplomados.style.display = 'none';
                        };

                        // Mostrar el submenú cuando el cursor está sobre el enlace
                        cursosLink.addEventListener('mouseenter', () => showSubMenu(subMenuCursos));
                        capacitacionesLink.addEventListener('mouseenter', () => showSubMenu(subMenuCapacitaciones));
                        certificacionesLink.addEventListener('mouseenter', () => showSubMenu(subMenuCertificaciones));
                        talleresLink.addEventListener('mouseenter', () => showSubMenu(subMenuTalleres));
                        diplomadosLink.addEventListener('mouseenter', () => showSubMenu(subMenuDiplomados));

                        // Mantener visible el submenú mientras el cursor esté sobre él
                        subMenuCursos.addEventListener('mouseenter', () => showSubMenu(subMenuCursos));
                        subMenuCapacitaciones.addEventListener('mouseenter', () => showSubMenu(subMenuCapacitaciones));
                        subMenuCertificaciones.addEventListener('mouseenter', () => showSubMenu(subMenuCertificaciones));
                        subMenuTalleres.addEventListener('mouseenter', () => showSubMenu(subMenuTalleres));
                        subMenuDiplomados.addEventListener('mouseenter', () => showSubMenu(subMenuDiplomados));

                        // Ocultar el submenú cuando el cursor salga de él
                        subMenuCursos.addEventListener('mouseleave', hideSubMenus);
                        subMenuCapacitaciones.addEventListener('mouseleave', hideSubMenus);
                        subMenuCertificaciones.addEventListener('mouseleave', hideSubMenus);
                        subMenuTalleres.addEventListener('mouseleave', hideSubMenus);
                        subMenuDiplomados.addEventListener('mouseleave', hideSubMenus);

                        // Ocultar los submenús cuando el cursor no esté sobre "Desarrollo Profesional" o los submenús
                        navbarDropdown.addEventListener('mouseleave', hideSubMenus);
                    });
                </script>

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
                        <a class="dropdown-item text-uppercase" id="inscribirseCohpucpLink" href="#">Inscripciones al cohpucp</a>
                        <a class="dropdown-item text-uppercase" id="solicitudesLink" href="#">Solicitudes</a>
                        <a class="dropdown-item text-uppercase" id="comprarLink" href="#">Comprar</a>
                        <a class="dropdown-item text-uppercase" id="comprarLink" href="#">Poliza de seguro de vida</a>
                    </div>
                
                    <!-- Submenú para Solicitudes -->
                    <div class="dropdown-menu" id="subMenuSolicitudes" style="position: absolute; top: 100%; left: 100%; margin-left: 105px; margin-top:43px; display: none; z-index: 1000;">
                        <a class="dropdown-item text-uppercase" id="solicitudConstanciasLink" href="#">Solicitud de constancias</a>
                        <a class="dropdown-item text-uppercase" href="#">Solicitud de estado de cuenta</a>
                        <a class="dropdown-item text-uppercase" href="#">Solicitud de plan de pago</a>
                        <a class="dropdown-item text-uppercase" href="#">Ver solicitudes</a>
                    </div>
                
                    <!-- Submenú para Solicitud de constancias -->
                    <div class="dropdown-menu" id="subMenuConstancias" style="position: absolute; top: 0; left: 100%; margin-left: 350px; margin-top:43px; display: none; z-index: 1000;">
                        <a class="dropdown-item text-uppercase" href="#">Constancia de Solvencia</a>
                        <a class="dropdown-item text-uppercase" href="#">Constancia de ética</a>
                    </div>
                
                    <!-- Submenú para Inscribirse al cohpucp -->
                    <div class="dropdown-menu" id="subMenuInscribirseCohpucp" style="position: absolute; top: 100%; left: 100%; margin-left: 105px; display: none; z-index: 1000;">
                        <a class="dropdown-item text-uppercase" href="{{ route('inscripcion_firmas.create') }}">Firma de Auditoría</a>
                        <a class="dropdown-item text-uppercase" href="{{ route('inscripcion_firmas.index') }}">Ver inscripciones de firma</a>
                        <a class="dropdown-item text-uppercase" href="{{ route('inscripciones.create') }}">Agremiado</a>
                        <a class="dropdown-item text-uppercase" href="{{ route('inscripciones.index') }}">Ver inscripciones de agremiados</a>
                    </div>
                
                    <!-- Submenú para Comprar -->
                    <div class="dropdown-menu" id="subMenuComprar" style="position: absolute; top: 100%; left: 100%; margin-left: 105px; margin-top:88px; display: none; z-index: 1000;">
                        <a class="dropdown-item text-uppercase" id="sellosLink" href="#">Sellos</a>
                        <a class="dropdown-item text-uppercase" id="timbresLink" href="#">Timbres</a>
                        <a class="dropdown-item text-uppercase" href="#">Ver compras</a>
                    </div>
                
                    <!-- Submenú para Sellos -->
                    <div class="dropdown-menu" id="subMenuSellos" style="position: absolute; top: 0; left: 100%; margin-left: 270px; margin-top:90px; display: none; z-index: 1000;">
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
                        <a class="dropdown-item text-uppercase {{request()->routeIs('vacantes.*') ? 'text-warning' : ''}}" 
                            id="vacantesLink" href="#">Vacantes</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('perfiles-agremiados.*') ? 'text-warning' : ''}}" 
                            id="perfilesAgremiadosLink" href="#">Perfiles de Agremiados</a>
                    </div>
                
                    <!-- Submenú para Vacantes -->
                    <div class="dropdown-menu" id="subMenuVacantes" style="position: absolute; top: 0; left: 100%; display: none; margin-left:30px">
                        <a class="dropdown-item text-uppercase {{request()->routeIs('vacantes.index') ? 'text-warning font-weight-bold' : ''}}" 
                            href="{{ route('vacantes.index') }}">Solicitudes pendientes</a>
                        <a class="dropdown-item text-uppercase {{ request()->routeIs('vacantes.aprobadas') ? 'text-warning font-weight-bold' : '' }}" 
                             href="{{ route('vacantes.aprobadas') }}">Solicitudes aprobadas</a> 
                        <a class="dropdown-item text-uppercase {{request()->routeIs('vacantes.create') ? 'text-warning font-weight-bold' : ''}}" 
                            href="{{ route('vacantes.create') }}">Crear vacante</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('vacantes.ver') ? 'text-warning font-weight-bold' : ''}}" 
                            href="{{ route('vacantes.ver') }}">Ver vacantes</a>                                                          
                        <a class="dropdown-item text-uppercase {{request()->routeIs('vacantes.historial') ? 'text-warning font-weight-bold' : ''}}" 
                            href="#">Historial</a> <!-- Asegúrate de agregar la ruta del historial -->
                    </div>
                
                    <!-- Submenú para Perfiles de Agremiados -->
                    <div class="dropdown-menu" id="subMenuPerfilesAgremiados" style="position: absolute; top: 0; left: 100%; display: none; margin-left:30px; margin-top:45px">
                        <a class="dropdown-item text-uppercase {{request()->routeIs('perfiles-agremiados.ver') ? 'text-warning font-weight-bold' : ''}}" 
                            href="#">Ver perfiles</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('perfiles-agremiados.create') ? 'text-warning font-weight-bold' : ''}}" 
                            href="#">Crear perfil</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('perfiles-agremiados.index') ? 'text-warning font-weight-bold' : ''}}" 
                            href="#">Gestionar perfiles</a>
                    </div>
                </li>
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const vacantesLink = document.getElementById('vacantesLink');
                        const subMenuVacantes = document.getElementById('subMenuVacantes');
                        const perfilesAgremiadosLink = document.getElementById('perfilesAgremiadosLink');
                        const subMenuPerfilesAgremiados = document.getElementById('subMenuPerfilesAgremiados');
                        const navbarDropdown = document.getElementById('navbarDropdown');
                
                        const showSubMenu = (subMenu) => {
                            hideSubMenus(); // Ocultar otros submenús antes de mostrar el actual
                            subMenu.style.display = 'block';
                        };
                
                        const hideSubMenus = () => {
                            subMenuVacantes.style.display = 'none';
                            subMenuPerfilesAgremiados.style.display = 'none';
                        };
                
                        vacantesLink.addEventListener('mouseenter', () => showSubMenu(subMenuVacantes));
                        perfilesAgremiadosLink.addEventListener('mouseenter', () => showSubMenu(subMenuPerfilesAgremiados));
                
                        subMenuVacantes.addEventListener('mouseenter', () => showSubMenu(subMenuVacantes));
                        subMenuPerfilesAgremiados.addEventListener('mouseenter', () => showSubMenu(subMenuPerfilesAgremiados));
                
                        subMenuVacantes.addEventListener('mouseleave', hideSubMenus);
                        subMenuPerfilesAgremiados.addEventListener('mouseleave', hideSubMenus);
                        navbarDropdown.addEventListener('mouseleave', hideSubMenus);
                    });
                </script>                                
     
                @can('ver boton mantenimientos')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase font-weight-bold 
                    {{  request()->routeIs('security_questions.index') || 
                        request()->routeIs('pais.index') ||
                        request()->routeIs('welcome-content.index')? 'text-warning' : '' }}" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown"
                        aria-haspopup="true" 
                        aria-expanded="false">
                        Mantenimientos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-uppercase {{request()->routeIs('security_questions.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('security_questions.index')}}">Preguntas de seguridad</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('sexos.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('sexos.index') }}">Género sexual</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('pais.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('pais.index') }}">Países</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('idiomas.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('idiomas.index') }}">Idiomas</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('universidades.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('universidades.index') }}">Universidades</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('numero_colegiacion.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('numero_colegiacion.index') }}">Asignar Nº colegiación</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('categorias.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('categorias.index') }}">Categorías</a> 
                        <a class="dropdown-item text-uppercase {{request()->routeIs('dashboard-content.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('dashboard-content.index') }}">Dasboard</a>
                        <a class="dropdown-item text-uppercase {{request()->routeIs('welcome-content.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('welcome-content.index') }}">Home</a> 
                        <a class="dropdown-item text-uppercase {{request()->routeIs('footer-content.index') ? 'text-warning font-weight-bold' : ''}}" href="{{ route('footer-content.index') }}">Pie de página</a> 
                    </div>
                </li>                
                @endcan

                @can('ver boton notificaciones')
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="tim-icons icon-bell-55"></i>
                        <p class="d-lg-none text-uppercase">Notificaciones</p>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                        <li class="dropdown-item text-uppercase">
                            {{-- <a href="{{ route('inscripciones.index') }}" class="nav-link" style="color: black;">
                                Ver Inscripciones
                            </a> --}}
                        </li>
                        <li class="dropdown-item text-uppercase">
                            {{-- <a href="{{ route('inscripcion_firmas.index') }}" class="nav-link" style="color: black;">
                                Ver Inscripciones Firmas
                            </a> --}}
                        </li>
                        <!-- Aquí puedes agregar más elementos de notificación si es necesario -->
                    </ul>
                </li>
            @endcan


                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="tim-icons icon-single-02"></i>
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
