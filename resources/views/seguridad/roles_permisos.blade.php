@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h4 class="card-title">Roles</h4>
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#crearRolModal">Agregar Nuevo Rol</button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter" id="">
            <thead class="text-primary">
              <tr>
                <th>Nombre Rol</th>
                <th class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Administrador</td>
                <td class="text-center">
                  <a href="/roles/1/edit" class="btn btn-sm btn-info">Editar</a>
                  <form action="/roles/1" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                  </form>
                </td>
              </tr>
              <tr>
                <td>Usuario</td>
                <td class="text-center">
                  <a href="/roles/2/edit" class="btn btn-sm btn-info">Editar</a>
                  <form action="/roles/2" method="POST" style="display:inline-block;">
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

<!-- Modal para crear un nuevo rol -->
<div class="modal fade" id="crearRolModal" tabindex="-1" role="dialog" aria-labelledby="crearRolModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearRolModalLabel">Agregar Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="crearRolForm">
          <div class="form-group">
            <label for="nombreRol">Nombre Rol</label>
            <input type="text" class="form-control" id="nombreRol" placeholder="Ingrese el nombre del rol">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="guardarRol">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('guardarRol').addEventListener('click', function() {
    // Aquí se agregará la lógica para guardar el rol
    // Después de guardar, cierra el modal y limpia el campo de texto
    $('#crearRolModal').modal('hide');
    document.getElementById('nombreRol').value = ''; // Limpiar el campo de texto
  });
</script>
@endsection
