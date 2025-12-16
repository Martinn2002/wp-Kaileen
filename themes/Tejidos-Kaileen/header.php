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

    <!-- NAV PRINCIPAL -->
    <nav class="navbar nav-principal py-2">
        <div class="container-fluid d-flex flex-column align-items-center">

            <!-- FILA SUPERIOR -->
            <div class="d-flex align-items-center justify-content-between w-100">

                <!-- LOGO -->
                <a class="navbar-brand m-0 mx-auto mx-lg-0" href="<?php echo esc_url( home_url('/') ); ?>">
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        echo '<h2>' . esc_html( get_bloginfo('name') ) . '</h2>';
                    }
                    ?>
                </a>

                <!-- ICONOS DESKTOP -->
                <div class="d-none d-lg-flex align-items-center gap-3 ms-auto icons-desktop">

                    <!-- CARRITO -->
                    <?php if ( class_exists('WooCommerce') ) : ?>
                        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-carrito.png" alt="Carrito">
                        </a>
                    <?php endif; ?>

                    <!-- USUARIO -->
                    <?php if ( class_exists('WooCommerce') ) : ?>
                        <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-usuario.png" alt="Usuario">
                        </a>
                    <?php endif; ?>

                </div>

                <!-- BOTÓN HAMBURGUESA -->
                <button class="navbar-toggler p-0 d-lg-none" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>

            <!-- BUSCADOR MOBILE -->
            <div class="w-100 mt-2 px-2 d-lg-none">
                <form class="input-group" method="get" action="<?php echo esc_url( home_url('/') ); ?>">
                    <input type="search" name="s" class="form-control" placeholder="Buscar productos...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

        </div>
    </nav>

    <!-- NAV SECUNDARIO (DESKTOP) -->
    <nav class="navbar navbar-expand-lg nav-secundario d-none align-content-center text-decoration-none d-lg-block">
        <div class="container-fluid justify-content-between">

            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu_secundario',
                'container'      => false,
                'menu_class'     => 'navbar-nav me-auto mb-lg-0 d-flex gap-4',
                'fallback_cb'    => false,
                'depth'          => 1,
                'link_before'    => '<span class="nav-link">',
                'link_after'     => '</span>',
            ));
            ?>

            <!-- BUSCADOR DESKTOP -->
            <form class="d-flex" role="search" method="get" action="<?php echo esc_url( home_url('/') ); ?>" style="max-width:300px;">
                <input class="form-control me-2" type="search" name="s" placeholder="Buscar productos...">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

        </div>
    </nav>

    <!-- OFFCANVAS MOBILE -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu">
        <div class="offcanvas-header">
            <button type="button" class="btn p-0" data-bs-dismiss="offcanvas">
                <i class="bi bi-x-lg fs-3"></i>
            </button>
             <?php if ( class_exists('WooCommerce') ) : ?>
                <hr>

                <a class="nav-link d-flex align-items-center" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-carrito.png" class="icon-mobile me-2" alt="Carrito">
                    Carrito
                </a>

                <a class="nav-link d-flex align-items-center" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-usuario.png" class="icon-mobile me-2" alt="Usuario">
                    Mi cuenta
                </a>
            <?php endif; ?>
        </div>

        <div class="offcanvas-body">
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu_movil',
                'container'      => false,
                'menu_class'     => 'navbar-nav d-flex flex-column gap-3',
                'fallback_cb'    => false,
                'depth'          => 1,
                'link_before'    => '<span class="nav-link">',
                'link_after'     => '</span>',
            ));
            ?>

        </div>
    </div>

</header>
