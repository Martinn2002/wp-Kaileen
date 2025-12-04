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
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/chevron-left.svg" alt="volver"></a>
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
                        /**
                         * Esto imprime la galería nativa del producto (woocommerce)
                         */
                        do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                </div>
            </div>

            <!-- INFORMACIÓN + PERSONALIZACIÓN -->
            <div class="col-md-6">

                <!-- TÍTULO + COMPARTIR -->
                <div class="row">
                    <hr>
                    <div class="col-8">
                        <h2>Personaliza tu Modelo</h2>
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
                        <button id="boton-info-producto" class="btn boton-producto-info p-mediano active">Información</button>
                    </div>
                    <div class="col-6">
                        <button id="boton-personalizacion-producto" class="btn boton-producto-info p-mediano">Personalización</button>
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
                    </div>

                    <!-- CONTENIDO PERSONALIZACIÓN - SOLO YITH -->
                    <div id="contenido-personalizacion" class="d-none">
                     

                        <!-- BOTÓN AGREGAR AL CARRITO -->
                        <div class="mt-1 boton-carrito-producto d-flex text-center">
                            <?php woocommerce_template_single_add_to_cart(); ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
