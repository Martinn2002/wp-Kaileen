<?php
defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! is_a( $product, 'WC_Product' ) ) {
    $product = wc_get_product( get_the_ID() );
}

setup_postdata( get_post() );

get_header();
?>

<main>
    <div class="container">

        <!-- BOTÓN VOLVER -->
        <div class="row mt-3 mb-1">
            <div class="col-12">
                <?php 
                    $back = wp_get_referer() ? wp_get_referer() : home_url();
                ?>
                <a href="<?php echo esc_url( $back );?>" class="btn-volver">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/chevron-left.svg" alt="volver">
                </a>
            </div>
        </div>

        <!-- TÍTULO -->
        <div class="row">
            <h1 class="titulo-seccion titulo-seccion-pagina">
                <?php the_title(); ?>
            </h1>
        </div>

        <div class="row">

            <!-- GALERÍA PRODUCTO -->
            <div class="col-md-6">
                <div class="galeria-producto">
                    <?php
                        do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                </div>
            </div>

            <!-- INFORMACIÓN + PERSONALIZACIÓN -->
            <div class="col-md-6">

                <!-- condicional de categorias para mostrar el "personalizable" -->
                <?php
                $tiene_modelo     = has_term( 'modelo', 'product_cat', $product->get_id() );
                $tiene_disponible = has_term( 'disponible', 'product_cat', $product->get_id() );

                $es_personalizable = $tiene_modelo && ! $tiene_disponible;
                ?>

                <!-- TÍTULO + COMPARTIR -->
                <div class="row">
                    <hr>
                    <div class="col-8">
                        <h2>
                            <?php echo $es_personalizable ? 'Personaliza tu modelo' : 'Producto disponible'; ?>
                        </h2>
                    </div>

                    <div class="col-4 d-flex justify-content-center">
                        <button class="btn-compartir btn-compartir-producto d-flex">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/box-arrow.svg" alt="compartir">
                        </button>
                    </div>
                </div>

                <!-- BOTONES TABS -->
                <div class="row row-boton-producto mt-3">
                    <div class="col-6">
                        <button id="boton-info-producto" class="btn boton-producto-info p-mediano active">
                            Información
                        </button>
                    </div>
                    <div class="col-6">
                        <?php if ( $es_personalizable ) : ?>
                            <button id="boton-personalizacion-producto" class="btn boton-producto-info p-mediano">
                                Personalización
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- CONTENEDOR INFO / PERSONALIZACIÓN -->
                <div id="info-producto" class="row">

                    <!-- CONTENIDO INFO -->
                    <div id="contenido-info" class="contenido-activo">
                        <?php
                            // Descripción corta
                            echo '<div class="descripcion-corta">';
                            the_excerpt();
                            echo '</div>';
                        ?>

                        <!-- BOTÓN AGREGAR AL CARRITO (SOLO DISPONIBLES) -->
                        <?php if ( ! $es_personalizable ) : ?>
                            <div class="mt-1 boton-carrito-producto d-flex text-center">
                                <?php woocommerce_template_single_add_to_cart(); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- CONTENIDO PERSONALIZACIÓN - SOLO YITH -->
                    <?php if ( $es_personalizable ) : ?>
                        <div id="contenido-personalizacion" class="d-none">

                            <?php
                                /**
                                 * Formulario de personalización YITH + botón
                                 */
                                do_action( 'woocommerce_before_add_to_cart_form' );
                                woocommerce_template_single_add_to_cart();
                                do_action( 'woocommerce_after_add_to_cart_form' );
                            ?>

                        </div>
                    <?php endif; ?>

                </div>

            </div>

        </div>
    </div>
</main>

<?php get_footer(); ?>
