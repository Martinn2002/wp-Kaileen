
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <!-- nav principal -->
        <nav class="navbar nav-principal py-2">
            <div class="container-fluid d-flex flex-column align-items-center">
            <!-- menu superior -->
                <div class="d-flex align-items-center justify-content-between w-100">
                    <!-- btn idioma -->
                    <button class="btn btn-idioma d-lg-none">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-traductor.png" alt="Idioma" class="icon-mobile">
                    </button>

                    <!-- fin btn idioma -->
                    <a class="navbar-brand m-0 mx-auto mx-lg-0" href="<?php echo home_url('/'); ?>">
                        <?php 
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            echo '<h2>' . get_bloginfo("name") . '</h2>';
                        }
                        ?>
                    </a>

                    <div class="d-none d-lg-flex align-items-center gap-3 ms-auto icons-desktop">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-traductor.png" alt="Idioma"></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-carrito.png" alt="Carrito"></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-usuario.png" alt="Usuario"></a>
                    </div>

                    <button class="navbar-toggler p-0 d-lg-none" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="w-100 mt-2 px-2 d-lg-none">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar productos...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- nav secundario (solo desktop) -->
        <nav class="navbar navbar-expand-lg nav-secundario">
            <div class="container-fluid justify-content-between">
                <ul class="navbar-nav me-auto mb-lg-0 d-flex gap-4">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Catálogo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Disponible</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sobre mi</a></li>
                </ul>
                <form class="d-flex" role="search" style="max-width: 300px;">
                    <input class="form-control me-2" type="search" placeholder="Buscar productos...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </nav>

        <!-- menu hamburguesa offcanvas -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu">
            <div class="offcanvas-header">
                <button type="button" class="btn p-0" data-bs-dismiss="offcanvas">
                    <i class="bi bi-x-lg fs-3"></i>
                </button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav d-flex flex-column gap-3">
                    <li><a class="nav-link" href="#">Home</a></li>
                    <li><a class="nav-link" href="#">Catálogo</a></li>
                    <li><a class="nav-link" href="#">Disponible</a></li>
                    <li><a class="nav-link" href="#">Sobre mi</a></li>
                    <li>
                        <a class="nav-link d-flex align-items-center" href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-carrito.png" class="icon-mobile me-2" alt="Carrito">Carrito
                        </a>
                    </li>
                    <li>
                        <a class="nav-link d-flex align-items-center" href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-usuario.png" class="icon-mobile me-2" alt="Usuario">Registrarse / Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
