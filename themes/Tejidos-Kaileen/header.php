<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
    <nav class="navbar py-2 border-bottom">
        <div class="container-fluid d-flex flex-column align-items-center">

            <div class="d-flex align-items-center justify-content-between w-100">

             
                <button class="btn btn-idioma">
                    <i class="bi bi-translate fs-5"></i>
                </button>

                
                <a class="navbar-brand m-0" href="<?php echo home_url(); ?>">
                    <?php 
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<h2>' . get_bloginfo("name") . '</h2>';
                    }
                    ?>
                </a>

                <button class="navbar-toggler p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                    <i class="bi bi-list icono-menu"></i>
                </button>

            </div>

           
            <div class="w-100 mt-2 px-2">
                <?php get_search_form(); ?>
            </div>

        </div>
    </nav>

 
    <div class="offcanvas offcanvas-end offcanvas-personalizado" tabindex="-1" id="offcanvasMenu">

        <div class="offcanvas-header d-flex align-items-center justify-content-between">

           
            <div class="top-menu">
                <div>
                    <i class="bi bi-person-circle icono-usuario"></i>
                </div>

                <?php if (is_user_logged_in()) : ?>
                    <a href="<?php echo wp_logout_url(); ?>" class="enlace-login">Cerrar sesión</a>
                <?php else : ?>
                    <a href="<?php echo wp_registration_url(); ?>" class="enlace-login">Registrarse</a>
                    <a href="<?php echo wp_login_url(); ?>" class="enlace-login">Ingresar</a>
                <?php endif; ?>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">

          
            <?php
            wp_nav_menu([
                'theme_location' => 'menu-principal',
                'container'      => false,
                'menu_class'     => 'menu-lista list-unstyled',
                'fallback_cb'    => false
            ]);
            ?>

        </div>
    </div>

</header>
