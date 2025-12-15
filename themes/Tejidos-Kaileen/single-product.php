<?php
defined('ABSPATH') || exit;

global $product;

if (empty($product) || ! is_a($product, 'WC_Product')) {
    $product = wc_get_product(get_the_ID());
}

setup_postdata(get_post());

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
                <a href="<?php echo esc_url($back); ?>" class="btn-volver">
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
                    do_action('woocommerce_before_single_product_summary');
                    ?>
                </div>
            </div>

            <!-- INFORMACIÓN -->
            <div class="col-md-6">

                <!-- TÍTULO + COMPARTIR -->
                <div class="row row-single mt-1">
                    <hr>

                    <div class="col-8">
                        <?php if (has_term('modelo', 'product_cat')) : ?>
                            <h2>Personaliza tu Modelo</h2>
                        <?php else : ?>
                            <h2><?php echo $product->get_price_html(); ?></h2>
                        <?php endif; ?>
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
                        <button
                            id="boton-info-producto"
                            class="btn boton-producto-info p-mediano active">
                            Información
                        </button>
                    </div>

                    <div class="col-6">
                        <?php if (has_term('modelo', 'product_cat')) : ?>
                            <button
                                id="boton-personalizacion-producto"
                                class="btn boton-producto-info p-mediano">
                                Personalización
                            </button>
                        <?php else : ?>
                            <button
                                id="boton-medidas-producto"
                                class="btn boton-producto-info p-mediano">
                                Medidas
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- CONTENIDO -->
                <div id="info-producto" class="row">

                    <!-- INFO -->
                    <div id="contenido-info">
                        <div class="descripcion-corta mt-1">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>

                    <!-- PERSONALIZACIÓN -->
                    <?php if (has_term('modelo', 'product_cat')) : ?>
                        <div id="contenido-personalizacion" class="d-none">
                            <div class="mt-1 boton-carrito-producto d-flex text-center">
                                <?php woocommerce_template_single_add_to_cart(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- MEDIDAS -->
                    <?php if (! has_term('modelo', 'product_cat')) : ?>
                        <div id="contenido-medidas" class="d-none">
                            <div class="medidas-producto">

                                <?php
                                $talla   = $product->get_attribute('pa_talla');
                                $medidas = $product->get_attribute('pa_medidas');
                                ?>

                                <?php if ($talla || $medidas) : ?>

                                    <?php if ($talla) : ?>
                                        <p><strong>Talla:</strong> <?php echo esc_html($talla); ?></p>
                                    <?php endif; ?>

                                    <?php if ($medidas) : ?>
                                        <p><strong>Medidas:</strong> <?php echo esc_html($medidas); ?></p>
                                    <?php endif; ?>

                                <?php else : ?>
                                    <p class="mt-1">No hay medidas específicas para este producto.</p>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
