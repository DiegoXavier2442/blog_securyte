
  <!-- Navbar 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="index.html">
        <i class="bi bi-journal-text" style="font-size:24px;"></i>
        <span>Mi Blog</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Abrir menú">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        
      </div>
    </div>
  </nav>-->

  <!-- Contenido Principal -->
  <div class="container flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <div class="col-md-6 col-lg-4 mx-auto">
        <div class="card border-dark shadow">
          <div class="card-body p-4">
            <div class="text-center mb-4">
              <h3 class="mt-3 mb-1 fw-bold">Crear Cuenta</h3>
            </div>

            <form id="registroForm" method ="post">
              <div class="mb-3">
                <label for="nombre" class="form-label d-flex align-items-center gap-2">
                  <i class="bi bi-person" style="font-size:16px;"></i><span>Nombre de usuario</span>
                </label>
                <input type="text" class="form-control" id="usuario" name="registroNombre"
                       placeholder="Elige un nombre de usuario" required autofocus autocomplete="username">
              </div>

              <div class="mb-3">
                <label for="email" class="form-label d-flex align-items-center gap-2">
                  <i class="bi bi-envelope" style="font-size:16px;"></i><span>Correo electrónico</span>
                </label>
                <input type="email" class="form-control" id="email" name="registroEmail"
                       placeholder="correo@ejemplo.com" required autocomplete="email">
              </div>

              <div class="mb-4">
                <label for="password" class="form-label d-flex align-items-center gap-2">
                  <i class="bi bi-lock" style="font-size:16px;"></i><span>Contraseña</span>
                </label>
                <input type="password" class="form-control" id="password" name="registroPassword"
                       placeholder="Crea una contraseña segura" required autocomplete="new-password">
              </div>

              <div class="d-grid gap-2">

              <?php

  //$registro = new controladorFormularios ();
  
 // $registro -> ctrRegistro();

                  $registro = ControladorFormularios::ctrRegistro();

                  if($registro=="ok"){

                    // limpiar el storage, el almacenamiento que esta teniendo el navegador 
                    // si no tengo el script se va a vlover a enviar la informcion cada ves que actualice el formulario 

      echo '<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>';


                    echo'<div class = "alert alert-success"> El usuario ha sido registrado </div>';

                  }

            ?>

                <button type="submit" class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center gap-2">
                  <i class="bi bi-person-plus"></i><span>Registrarse</span>
                </button>
              </div>
            </form>

            <div class="text-center mt-3">
              <a href="index.php?pagina=login" class="text-decoration-none text-dark">
                <small>¿Ya tienes cuenta? <strong>Inicia sesión aquí</strong></small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  