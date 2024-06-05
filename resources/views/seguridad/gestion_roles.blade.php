@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Usuarios</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter" id="">
            <thead class="text-primary">
              <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol Actual</th>
                <th>Agregar nuevo rol</th>
                <th class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Anibal Godinez</td>
                <td>anibalgodinez64@gmail.com</td>
                <td>Administrador</td>
                <td>
                  <select class="form-control" id="rolUsuario1">
                    <option value="administrador" selected>Administrador</option>
                    <option value="usuario">Usuario</option>
                  </select>
                </td>
                <td class="text-center">
                  <button class="btn btn-sm btn-info">Asignar</button>
                  <button class="btn btn-sm btn-danger cancelar-edicion">Cancelar</button>
                </td>
              </tr>
              <tr>
                <td>Johan Cortez</td>
                <td>johancortez45@gmail.com</td>
                <td>Usuario</td>
                <td>
                  <select class="form-control" id="rolUsuario2">
                    <option value="administrador">Administrador</option>
                    <option value="usuario" selected>Usuario</option>
                  </select>
                </td>
                <td class="text-center">
                  <button class="btn btn-sm btn-info">Asignar</button>
                  <button class="btn btn-sm btn-danger cancelar-edicion">Cancelar</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('.btn-primary').forEach(button => {
    button.addEventListener('click', function() {
      const row = this.closest('tr');
      const userId = row.querySelector('select').id.replace('rolUsuario', '');
      const newRole = row.querySelector('select').value;
      console.log(`Guardar cambios para usuario ${userId} con nuevo rol ${newRole}`);
      // Aquí se agregará la lógica para guardar el cambio de rol
      // Ejemplo de petición AJAX (ajusta según tu backend):
      fetch(`/usuarios/${userId}/cambiar-rol`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}' // Incluye el token CSRF
        },
        body: JSON.stringify({ rol: newRole })
      }).then(response => {
        if (response.ok) {
          alert('Rol actualizado correctamente.');
        } else {
          alert('Hubo un error al actualizar el rol.');
        }
      }).catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al actualizar el rol.');
      });
    });
  });

  document.querySelectorAll('.cancelar-edicion').forEach(button => {
    button.addEventListener('click', function() {
      const row = this.closest('tr');
      const userId = row.querySelector('select').id.replace('rolUsuario', '');
      const currentRole = row.querySelector('td:nth-child(3)').textContent;
      row.querySelector('select').value = currentRole.toLowerCase();
    });
  });
</script>
@endsection
