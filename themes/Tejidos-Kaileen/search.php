<?php get_header(); ?>

<main>
  <div class="container container-main">

    <h1 class="titulo-seccion">
      Resultados para: "<?php echo esc_html(get_search_query()); ?>"
    </h1>

    <div class="row">

    <?php if (have_posts()): ?>
      <?php while (have_posts()): the_post();

        $product = wc_get_product(get_the_ID());
        if (!$product) continue;
      ?>

        <div class="col-md-4">
          <div class="tarjeta-producto mb-2">

            <a href="<?php the_permalink(); ?>">
              <?php echo woocommerce_get_product_thumbnail(); ?>
            </a>

            <div class="producto-meta d-flex justify-content-between align-items-start">
              <div class="producto-info">
                <h3><?php the_title(); ?></h3>
                <p class="p-grande"><?php echo $product->get_price_html(); ?></p>
                <p class="p-mediano">
                  <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                </p>
              </div>

              <button class="btn-compartir">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/box-arrow.svg" alt="compartir">
              </button>
            </div>

          </div>
        </div>

      <?php endwhile; ?>

    <?php else: ?>

      <p>No se encontraron productos con ese nombre.</p>

    <?php endif; ?>

    </div>

  </div>
</main>

<?php get_footer(); ?>
