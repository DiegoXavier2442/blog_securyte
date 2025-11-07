<?php

if(!isset($_SESSION["validarIngreso"])){
    echo '<script>window.location = "index.php?pagina=login";</script>';
    return;
} else {
    if($_SESSION["validarIngreso"] != "ok") {
        echo '<script>window.location = "index.php?pagina=login";</script>';
        return;
    }
}

$usuario = ControladorFormularios::ctrMostrarPerfil();

// Procesar actualizaciones
$actualizarPerfil = ControladorFormularios::ctrActualizarPerfil();
$cambiarPassword = ControladorFormularios::ctrCambiarPassword();

// Recargar datos después de actualizar
if($actualizarPerfil == "ok" || $cambiarPassword == "ok"){
    $usuario = ControladorFormularios::ctrMostrarPerfil();
}
?>

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
            <h3 class="mb-1"><?php echo $usuario["usuario"]; ?></h3>
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
              <div class="col-sm-8"><?php echo $usuario["usuario"]; ?></div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-4">
                <strong>Correo electrónico:</strong>
              </div>
              <div class="col-sm-8"><?php echo $usuario["email"]; ?></div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <strong>Fecha de registro:</strong>
              </div>
              <div class="col-sm-8"><?php echo $usuario["fecha_registro"]; ?></div>
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
          <form id="editarPerfilForm" method="post">
            <div class="mb-3">
              <label for="editUsuario" class="form-label">Nombre de usuario</label>
              <input type="text" class="form-control" id="editUsuario" name="actualizarNombre" value="<?php echo $usuario['usuario']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="editEmail" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="editEmail" name="actualizarEmail" value="<?php echo $usuario['email']; ?>" required>
            </div>
            <!-- ← AGREGAR ESTE INPUT HIDDEN -->
            <input type="hidden" name="tokenUsuario" value="<?php echo $usuario['token']; ?>">
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
          <form id="cambiarPasswordForm" method="post">
            <div class="mb-3">
              <label for="passwordActual" class="form-label">Contraseña actual</label>
              <input type="password" class="form-control" id="passwordActual" name="actualizarPassword" required>
            </div>
            <div class="mb-3">
              <label for="passwordNueva" class="form-label">Nueva contraseña</label>
              <input type="password" class="form-control" id="passwordNueva" name="nuevaPassword" required>
            </div>
            <div class="mb-3">
              <label for="passwordConfirmar" class="form-label">Confirmar nueva contraseña</label>
              <input type="password" class="form-control" id="passwordConfirmar" name="confirmarPassword" required>
            </div>
            <input type="hidden" name="passwordActual" value="<?php echo $usuario['contrasenia']; ?>">
            <input type="hidden" name="tokenUsuario" value="<?php echo $usuario['token']; ?>">
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