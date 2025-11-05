<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Blog - Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  
  <!-- Google Font: Courier Prime -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  
  <style>
    /* Aplicar Courier Prime a todo el sitio */
    * {
      font-family: 'Courier Prime', monospace !important;
    }
    
    .dropdown-menu { z-index: 1050 !important; }
    .dropdown-item.active { background-color:#fff !important; color:#000 !important; font-weight:500; }
  </style>
</head>
<body class="d-flex flex-column h-100">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="index.html">
        <i class="bi bi-journal-text"></i><span>Mi Blog</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Abrir menú">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Izquierda -->
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="index.html">Inicio</a>
          </li>

          <!-- Dropdown Categorías -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navCats"
               data-bs-toggle="dropdown" aria-expanded="false">
              Categorías
            </a>
            <ul class="dropdown-menu" aria-labelledby="navCats">
              <li>
                <a class="dropdown-item" href="#" data-category="frontend">
                  Front End
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#" data-category="backend">
                  Back End
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item active" href="#" data-category="all">Todas las categorías</a></li>
            </ul>
          </li>
        </ul>

        <!-- Derecha -->
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="navUser"
               data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i>
              <span>Usuario</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navUser">
              <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contenido Principal -->
  <div class="container mt-4 flex-grow-1">

    <!-- Flash message -->
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check2-circle"></i> Bienvenido al blog
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>

    <!-- Cabecera del listado -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="mb-0">Últimos artículos</h4>
    </div>

    <!-- Botón crear artículo -->
    <div class="row mb-4">
      <div class="col-12 text-end">
        <button class="btn btn-dark d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#crearArticuloModal">
          <i class="bi bi-plus-circle"></i><span>Crear Artículo</span>
        </button>
      </div>
    </div>

    <!-- Modal crear artículo -->
    <div class="modal fade" id="crearArticuloModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Crear Nuevo Artículo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <form id="formArticulo" class="needs-validation" novalidate>
              <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" maxlength="200" required>
              </div>

              <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select class="form-select" id="categoria" name="categoria" required>
                  <option value="">Seleccionar categoría</option>
                  <option value="frontend">Front End</option>
                  <option value="backend">Back End</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="8" required></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" form="formArticulo" class="btn btn-dark">Publicar Artículo</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Listado de artículos -->
    <div class="row">
      <!-- Artículo 1 -->
      <div class="col-md-12 mb-4">
        <div class="card border-dark">
          <div class="card-body">
            <details class="article-details">
              <summary style="cursor:pointer; list-style:none;">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h5 class="card-title mb-0 fw-bold">
                    Introducción a React Hooks
                  </h5>
                  <span class="badge bg-dark">Front End</span>
                </div>
                <p class="card-text text-muted small mb-0 d-flex align-items-center gap-2">
                  <span class="d-inline-flex align-items-center gap-1">
                    <i class="bi bi-person" style="font-size:14px;"></i>
                    <span>Juan Pérez</span>
                  </span>
                  <span class="mx-2">|</span>
                  <span class="d-inline-flex align-items-center gap-1">
                    <i class="bi bi-calendar" style="font-size:14px;"></i>
                    <span>04/11/2025</span>
                  </span>
                </p>
              </summary>
              <div class="mt-3 pt-3 border-top">
                <p class="card-text">
                  Los React Hooks revolucionaron la forma en que escribimos componentes funcionales.<br>
                  useState y useEffect son los más utilizados para manejar estado y efectos secundarios.
                </p>
              </div>
            </details>
          </div>
        </div>
      </div>

      <!-- Artículo 2 -->
      <div class="col-md-12 mb-4">
        <div class="card border-dark">
          <div class="card-body">
            <details class="article-details">
              <summary style="cursor:pointer; list-style:none;">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h5 class="card-title mb-0 fw-bold">
                    Node.js y Express: Construyendo APIs REST
                  </h5>
                  <span class="badge bg-dark">Back End</span>
                </div>
                <p class="card-text text-muted small mb-0 d-flex align-items-center gap-2">
                  <span class="d-inline-flex align-items-center gap-1">
                    <i class="bi bi-person" style="font-size:14px;"></i>
                    <span>María López</span>
                  </span>
                  <span class="mx-2">|</span>
                  <span class="d-inline-flex align-items-center gap-1">
                    <i class="bi bi-calendar" style="font-size:14px;"></i>
                    <span>03/11/2025</span>
                  </span>
                </p>
              </summary>
              <div class="mt-3 pt-3 border-top">
                <p class="card-text">
                  Express.js es un framework minimalista para Node.js que facilita la creación de APIs REST.<br>
                  Con su sistema de middleware, podemos estructurar aplicaciones escalables y mantenibles.
                </p>
              </div>
            </details>
          </div>
        </div>
      </div>

      <!-- Artículo 3 -->
      <div class="col-md-12 mb-4">
        <div class="card border-dark">
          <div class="card-body">
            <details class="article-details">
              <summary style="cursor:pointer; list-style:none;">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h5 class="card-title mb-0 fw-bold">
                    CSS Grid vs Flexbox: ¿Cuándo usar cada uno?
                  </h5>
                  <span class="badge bg-dark">Front End</span>
                </div>
                <p class="card-text text-muted small mb-0 d-flex align-items-center gap-2">
                  <span class="d-inline-flex align-items-center gap-1">
                    <i class="bi bi-person" style="font-size:14px;"></i>
                    <span>Carlos Ramírez</span>
                  </span>
                  <span class="mx-2">|</span>
                  <span class="d-inline-flex align-items-center gap-1">
                    <i class="bi bi-calendar" style="font-size:14px;"></i>
                    <span>02/11/2025</span>
                  </span>
                </p>
              </summary>
              <div class="mt-3 pt-3 border-top">
                <p class="card-text">
                  Tanto CSS Grid como Flexbox son herramientas poderosas para el diseño web.<br>
                  Grid es ideal para layouts bidimensionales, mientras que Flexbox brilla en disposiciones lineales.
                </p>
              </div>
            </details>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <div class="container">
      <p class="mb-0">&copy; 2025 Mi Blog. Todos los derechos reservados.</p>
    </div>
  </footer>

  <!-- Bootstrap JS (bundle con Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>