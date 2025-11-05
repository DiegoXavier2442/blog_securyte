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
              <h3 class="mt-3 mb-1 fw-bold">Iniciar Sesión</h3>
            </div>

            <form id="loginForm">
              <div class="mb-3">
                <label for="usuario" class="form-label d-flex align-items-center gap-2">
                  <i class="bi bi-person" style="font-size:16px;"></i><span>Usuario o correo</span>
                </label>
                <input type="text" class="form-control" id="usuario" name="usuario"
                       placeholder="Ingresa tu usuario o correo" required autofocus autocomplete="username">
              </div>

              <div class="mb-4">
                <label for="password" class="form-label d-flex align-items-center gap-2">
                  <i class="bi bi-lock" style="font-size:16px;"></i><span>Contraseña</span>
                </label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Ingresa tu contraseña" required autocomplete="current-password">
              </div>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-dark btn-lg d-inline-flex align-items-center justify-content-center gap-2">
                  <i class="bi bi-box-arrow-in-right"></i><span>Ingresar</span>
                </button>
              </div>
            </form>

            <div class="text-center mt-3">
              <a href="registro.php" class="text-decoration-none text-dark">
                <small>¿No tienes cuenta? <strong>Regístrate aquí</strong></small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>