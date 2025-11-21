<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tejidos Kaileen</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/estilo.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Syne:wght@400..800&display=swap" rel="stylesheet">
</head>

<body>

<header>
  <nav class="navbar py-2 border-bottom">
  <div class="container-fluid d-flex flex-column align-items-center">

    
    <div class="d-flex align-items-center justify-content-between w-100">
    
      <button class="btn btn-idioma">
        <i class="bi bi-translate fs-5"></i>
      </button>

      
      <a class="navbar-brand m-0" href="#">
        <img src="assets/img/logo-kaileen 1.png" alt="Logo">
      </a>

      
      <button class="navbar-toggler p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    
    <div class="w-100 mt-2 px-2">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar productos...">
        <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
      </div>
    </div>

  </div>
</nav>



<div class="offcanvas offcanvas-end offcanvas-personalizado" tabindex="-1" id="offcanvasMenu">
  <div>
      <button type="button" class="btn-close align-items-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-header d-flex align-items-center justify-content-between">
      <a href="#" class="enlace-login">Registrarse / Login</a>
      <img src="assets/img/iconos/Usuario.png" alt="Usuario" class="icono-usuario">
  </div>

  <div class="offcanvas-body">
    <h5 class="menu-titulo mb-3">Navegación</h5>
    <ul class="menu-lista list-unstyled">
      <li><a href="#">Inicio <span></a></li>
      <li><a href="#">Tienda <span></a></li>
      <li><a href="#">Categorías <span></a></li>
      <li><a href="#">Nosotros <span></a></li>
      <li><a href="#">Contacto <span></a></li>
    </ul>

    <h5 class="menu-seccion mt-4">Catálogo</h5>
    <ul class="menu-lista list-unstyled">
      <li><a href="#">Modelos a personalizar</a></li>
      <li><a href="#">Disponibles </a></li>
    </ul>
  </div>
</div>

</header>