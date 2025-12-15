<?php get_header(); ?>

<main>
    <div class="categorias-slider w-100">
            filtro     
    </div>

    <div class="container container-main">
        <h1 class="titulo-seccion">Modelos a Personalizar</h1>

        <div class="row">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); 
                $product = wc_get_product(get_the_ID());

                // 🔥 Categorías del producto (DENTRO DEL LOOP)
                $terms = get_the_terms(get_the_ID(), 'product_cat');
                $cats = [];

                if ($terms && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        if ($term->slug === 'disponibles') continue; // saltar categoría modelo
                        $cats[] = 'cat-' . $term->slug;
                    }
                }
            ?>

                <div class="col-md-4">
                    <div class="tarjeta-producto mb-2 <?php echo implode(' ', $cats); ?>">
                        
                        <a href="<?php the_permalink(); ?>">
                            <?php echo woocommerce_get_product_thumbnail(); ?>
                        </a>

                        <div class="producto-meta d-flex justify-content-between align-items-start">
                            <div class="producto-info">
                                <h3><?php the_title(); ?></h3>
                                <p class="p-grande"><?php echo $product->get_price_html(); ?></p>
                                <p class="p-mediano"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            </div>

                            <button class="btn-compartir">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/box-arrow.svg" alt="compartir">
                            </button>
                        </div>

                    </div>
                </div>

            <?php endwhile; ?>
        <?php else : ?>

            <p>No hay productos en esta categoría todavía.</p>

        <?php endif; ?>

        </div>

        <div class="row">
            <ul class="paginacion d-flex justify-content-center">
                <li><a class="p-btn" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/flecha-izquierda.png" alt="flecha izquierda"></a></li>
                <li><a class="p-btn active" href="#">1</a></li>
                <li><a class="p-btn" href="#">2</a></li>
                <li><a class="p-btn" href="#">3</a></li>
                <li><a class="p-btn" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/flecha-derecha.png" alt="flecha derecha"></a></li>
            </ul>
        </div>

    </div>
</main>

<?php get_footer(); ?>
