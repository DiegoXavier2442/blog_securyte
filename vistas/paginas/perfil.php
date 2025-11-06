
<!-- Contenido Principal -->
  <div class="container mt-4 flex-grow-1">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        
        <!-- Encabezado del perfil -->
        <div class="card border-dark mb-4">
          <div class="card-body text-center py-5">
            <div class="mb-3">
              <i class="bi bi-person-circle text-dark" style="font-size: 5rem;"></i>
            </div>
            <h3 class="mb-1">Usuario</h3>
          </div>
        </div>

        <!-- Información del perfil -->
        <div class="card border-dark mb-4">
          <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
              <i class="bi bi-info-circle me-2"></i>Información del Perfil
            </h5>
          </div>
          
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-sm-4">
                <strong>Nombre de usuario:</strong>
              </div>
              <div class="col-sm-8"><?php echo $value["usuario"];?></div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-4">
                <strong>Correo electrónico:</strong>
              </div>
              <div class="col-sm-8"><?php echo $value["email"];?></div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <strong>Fecha de registro:</strong>
              </div>
              <div class="col-sm-8"><?php echo $value["fecha_registro"];?></div>
            </div>
         
          </div>
        </div>

        <!-- Estadísticas -->
        <div class="card border-dark mb-4">
          <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
              <i class="bi bi-bar-chart me-2"></i>Mis Estadísticas
            </h5>
          </div>
          <div class="card-body">
            <div class="row text-center">
              <div class="col-md-6 mb-3 mb-md-0">
                <div class="p-3 border rounded">
                  <i class="bi bi-file-text text-dark display-4"></i>
                  <h4 class="mt-2 mb-0">5</h4>
                  <p class="text-muted mb-0">Artículos publicados</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded">
                  <i class="bi bi-calendar-check text-dark display-4"></i>
                  <h4 class="mt-2 mb-0">30</h4>
                  <p class="text-muted mb-0">Días activo</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Acciones -->
        <div class="card border-dark">
          <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
              <i class="bi bi-gear me-2"></i>Acciones
            </h5>
          </div>
          <div class="card-body">
            <div class="d-grid gap-2">
              <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#editarPerfilModal">
                <i class="bi bi-pencil me-2"></i>Editar Perfil
              </button>
              <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#cambiarPasswordModal">
                <i class="bi bi-key me-2"></i>Cambiar Contraseña
              </button>
              <a href="index.php?pagina=inicio" class="btn btn-dark">
                <i class="bi bi-arrow-left me-2"></i>Volver al Blog
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Modal Editar Perfil -->
  <div class="modal fade" id="editarPerfilModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <form id="editarPerfilForm">
            <div class="mb-3">
              <label for="editUsuario" class="form-label">Nombre de usuario</label>
              <input type="text" class="form-control" id="editUsuario" value="Usuario" required>
            </div>
            <div class="mb-3">
              <label for="editEmail" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="editEmail" value="usuario@ejemplo.com" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" form="editarPerfilForm" class="btn btn-dark">Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Cambiar Contraseña -->
  <div class="modal fade" id="cambiarPasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cambiar Contraseña</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <form id="cambiarPasswordForm">
            <div class="mb-3">
              <label for="passwordActual" class="form-label">Contraseña actual</label>
              <input type="password" class="form-control" id="passwordActual" required>
            </div>
            <div class="mb-3">
              <label for="passwordNueva" class="form-label">Nueva contraseña</label>
              <input type="password" class="form-control" id="passwordNueva" required>
            </div>
            <div class="mb-3">
              <label for="passwordConfirmar" class="form-label">Confirmar nueva contraseña</label>
              <input type="password" class="form-control" id="passwordConfirmar" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" form="cambiarPasswordForm" class="btn btn-dark">Cambiar Contraseña</button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>