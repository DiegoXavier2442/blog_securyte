<?php 
//variable de secion 
//session_start();

?>
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
      <a class="navbar-brand d-flex align-items-center gap-2" href="index.php?pagina=inicio">
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
            <a class="nav-link active" href="index.php?pagina=inicio">Inicio</a>
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
              <li><a class="dropdown-item" href="index.php?pagina=registro">Registrarse</a></li>
              <li><a class="dropdown-item" href="index.php?pagina=login">iniciar sesión</a></li>
              <li><a class="dropdown-item" href="index.php?pagina=salir">Cerra sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contenido Principal -->
  <?php 

 // include "paginas/inicio.php";
// lista blanca y pagina 404= son aquellas paginas que permito pasar a traves de una url 
// ATAQUE DE INYECCION SQL A TRAVES DE URL 
// ATAQUE CODE INJECTION: PERMITE AL ATACANTE INJECTAR CODIGO FUENTE EN LA 
//APLICACION DE FORMA QUE ES INTERPRETADO Y EJECUTADO 

if (isset($_GET["pagina"])){
   if( $_GET["pagina"]=="inicio"||
    $_GET["pagina"]=="salir"||
    $_GET["pagina"]=="registro"||
     $_GET["pagina"]=="login"){


   include "paginas/". $_GET["pagina"].".php";

   }else{
    
        include "paginas/error404.php";

    }


}else{
    include "paginas/registro.php";

}


?>

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