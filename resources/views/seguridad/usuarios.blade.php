@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Usuarios Logueados</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter" id="usuariosTable">
            <thead class="text-primary">
              <tr>
                <th>Nombre Usuario</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Contraseña</th>
                <th class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr data-id="1">
                <td>Anibal Godinez</td>
                <td>anibalgodinez64@gmail.com</td>
                <td>Administrador</td> <!-- Nuevo -->
                <td>$2y$10$K7Q5w8XJ1QJ1X4N5TlK8/OCFOC8A9PE78uO5Mt1C1e8W.C1E7EZmC</td>
                <td class="text-center">
                  <button type="button" class="btn btn-sm btn-info editar-usuario" data-id="1">Editar</button>
                  <form action="/usuarios/1" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                  </form>
                </td>
              </tr>
              <tr data-id="2">
                <td>Johan Cortez</td>
                <td>johancortez45@gmail.com</td>
                <td>Usuario</td> <!-- Nuevo -->
                <td>$2y$10$e7dY.1e5O0O1S5N5TlL6/E3M6P5A9YE3M1d4P1H2C1lO4L7V7J7nC</td>
                <td class="text-center">
                  <button type="button" class="btn btn-sm btn-info" data-id="2">Editar</button>
                  <form action="/usuarios/2" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal para editar un usuario -->
<div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editarUsuarioForm">
          <div class="form-group">
            <label for="nombreUsuario">Nombre Usuario</label>
            <input type="text" class="form-control" id="nombreUsuario">
          </div>
          <div class="form-group">
            <label for="correoUsuario">Correo</label>
            <input type="email" class="form-control" id="correoUsuario">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="guardarEdicionUsuario">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

<script>
  // Agregar evento clic a los botones de editar usuario
  var botonesEditarUsuario = document.querySelectorAll('.editar-usuario');
  botonesEditarUsuario.forEach(function(boton) {
    boton.addEventListener('click', function() {
      var usuarioId = boton.getAttribute('data-id');
      var nombreUsuario = document.querySelector('#usuariosTable tr[data-id="' + usuarioId + '"] td:nth-child(1)').textContent;
      var correoUsuario = document.querySelector('#usuariosTable tr[data-id="' + usuarioId + '"] td:nth-child(2)').textContent;
      var rolUsuario = document.querySelector('#usuariosTable tr[data-id="' + usuarioId + '"] td:nth-child(3)').textContent;
      document.getElementById('nombreUsuario').value = nombreUsuario;
      document.getElementById('correoUsuario').value = correoUsuario;
      $('#editarUsuarioModal').modal('show');
    });
  });

  // Agregar evento clic al botón guardar edición usuario
  document.getElementById('guardarEdicionUsuario').addEventListener('click', function() {
    // Se agregará la lógica para guardar la edición del usuario
    // Después de guardar, cierra el modal
    $('#editarUsuarioModal').modal('hide');
  });
</script>
@endsection
