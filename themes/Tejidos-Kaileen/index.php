<?php get_header(); ?>

<div class="header-hero">
  <img src="<?php echo get_template_directory_uri() . '/assets/img/banner.png'; ?>" alt="">
</div>

<div class="promo-cinta">
  <div class="promo-pista">
    <span class="promo-item">Promoción 2x1 toda la semana</span>
    <span class="promo-item">Envíos a todo Chile</span>
    <span class="promo-item">Nuevas colecciones</span>
  </div>
</div>

<div class="container">
  <main>


    <h1 class="titulo-seccion titulo-h1">Materializa tus ideas</h1>
    <h2 class="mb-3 text-center">Tejidos Kaileen servicio 100% personalizado para llevar a la vida todas tus ideas</h2>


    <div id="carouselPrendas" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">


        <div class="carousel-item active">
          <div class="row justify-content-center">
            <div class="col-4 col-md-4">
              <img src="<?php echo get_template_directory_uri() . '/assets/img/perso-banner-1.png' ?>" class="img-banner-perso img-fluid d-block w-100" alt="Prenda 1">
            </div>
            <div class="col-4 col-md-4">
              <img src="<?php echo get_template_directory_uri() . '/assets/img/perso-banner-2.png' ?>" class="img-banner-perso img-fluid d-block w-100" alt="Prenda 2">
            </div>
            <div class="col-4 col-md-4">
              <img src="<?php echo get_template_directory_uri() . '/assets/img/perso-banner-3.png' ?>" class="img-banner-perso img-fluid d-block w-100" alt="Prenda 3">
            </div>
          </div>
        </div>


        <div class="carousel-item">
          <div class="row justify-content-center">
            <div class="col-4 col-md-4">
              <img src="<?php echo get_template_directory_uri() . '/assets/img/perso-banner-4.png' ?>" class="img-banner-perso img-fluid d-block w-100" alt="Prenda 4">
            </div>
            <div class="col-4 col-md-4">
              <img src="<?php echo get_template_directory_uri() . '/assets/img/perso-banner-5.png' ?>" class="img-banner-perso img-fluid d-block w-100" alt="Prenda 5">
            </div>
            <div class="col-4 col-md-4">
              <img src="<?php echo get_template_directory_uri() . '/assets/img/perso-banner-6.png' ?>" class="img-banner-perso img-fluid d-block w-100" alt="Prenda 6">
            </div>
          </div>
        </div>

      </div>


      <button class="carousel-control-prev" type="button" data-bs-target="#carouselPrendas" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselPrendas" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>



    <section class="my-3 paso-contenedor">

      <div id="paso-1" class="paso-tarjeta">
        <div class="paso-numero">
          <h2>1</h2>
        </div>
        <div>
          <h3>Revisa el catálogo de modelos</h3>
          <p class="p-grande">Puedes elegir distintos modelos de chalecos, abrigos, gorros y más</p>
        </div>
      </div>

      <div id="paso-2" class="paso-tarjeta">
        <div class="paso-numero">
          <h2>2</h2>
        </div>
        <div>
          <h3>Brinda tus medidas</h3>
          <p class="p-grande">Para un calce perfecto.</p>
        </div>
      </div>

      <div id="paso-3" class="paso-tarjeta">
        <div class="paso-numero">
          <h2>3</h2>
        </div>
        <div>
          <h3>Elige tus colores y materiales</h3>
          <p class="p-grande">Elige el tipo de lana y color que desees</p>
        </div>
      </div>

      <div id="paso-4" class="paso-tarjeta">
        <div class="paso-numero">
          <h2>4</h2>
        </div>
        <div>
          <h3>Añade detalles</h3>
          <p class="p-grande">Puedes elegir bolsillos, capuchas, botones y más detalles para hacer tu diseño aún más único</p>
        </div>
      </div>

      <div id="paso-5" class="paso-tarjeta">
        <div class="paso-numero">
          <h2>5</h2>
        </div>
        <div>
          <h3>Abona el 50%</h3>
          <p class="p-grande">Para comenzar a realizar tu pedido debes abonar la mitad del precio final y una vez terminado realizar el resto del pago para poder recibir tu producto original</p>
        </div>
      </div>

    </section>
    <div class="text-center mb-3">
      <a href="<?php echo get_term_link('Modelo', 'product_cat'); ?>" class="btn btn-principal p-grande">Ver Catálogo</a>
    </div>

</div>


<section class="info-franja">
  <div class="container justify-content-around">
    <div class="row">
      <div class="col-4"><img class="iconos-franja" src="<?php echo get_template_directory_uri() . '/assets/img/iconos/caja-aprobada.svg' ?>" alt="caja aprobada">
        <p class="p-mediano">Envío Gratis</p>
      </div>
      <div class="col-4"><img class="iconos-franja" src="<?php echo get_template_directory_uri() . '/assets/img/iconos/tarjetas.svg' ?>" alt="medio de pago">
        <p class="p-mediano">Diferentes Metodos De Pago</p>
      </div>
      <div class="col-4"><img class="iconos-franja" src="<?php echo get_template_directory_uri() . '/assets/img/iconos/chaleco.svg' ?>" alt="sweater">
        <p class="p-mediano">Diseño Personalizado</p>
      </div>
    </div>
  </div>
</section>


<!-- Aqui para cargar los productos del woocommerce -->

<div class="container">
  <h2 class="titulo-seccion">Disponibles</h2>
  <h3>Diseños disponibles para entrega inmediata</h3>
  <div id="carouselDisponibles" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      <?php
      $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 9,
        'product_cat'    => 'disponibles',
        'orderby'        => 'date',
        'order'          => 'DESC'
      );

      $loop = new WP_Query($args);

      if ($loop->have_posts()) :

        $count = 0;

        while ($loop->have_posts()) : $loop->the_post();
          global $product;

          // Abrir slide
          if ($count % 3 == 0) {
            echo '<div class="carousel-item ' . ($count == 0 ? 'active' : '') . '">
                    <div class="row justify-content-center">';
          }
      ?>

          <div class="col-10 col-md-4 <?php echo ($count % 3 != 0) ? 'd-none d-md-block' : ''; ?>">
            <div class="tarjeta-producto">
              <a href="<?php the_permalink(); ?>">
                <?php echo $product->get_image(); ?>
              </a>

              <div class="producto-meta d-flex justify-content-between align-items-start">
                <div class="producto-info">
                  <h3><?php the_title(); ?></h3>
                  <p class="p-grande"><?php echo $product->get_price_html(); ?></p>
                  <p class="p-mediano"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                </div>

                <button class="btn-compartir" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/box-arrow.svg" alt="compartir">
                </button>

              </div>
            </div>
          </div>

      <?php
          $count++;

          // Cerrar slide
          if ($count % 3 == 0) {
            echo '      </div>
                  </div>';
          }

        endwhile;

        // Cerrar slide si quedaron productos sueltos
        if ($count % 3 != 0) {
          echo '</div></div>';
        } else {
          echo '<p>No hay productos disponibles por ahora.</p>';
        }
      endif;

      wp_reset_postdata();
      ?>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDisponibles" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselDisponibles" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>

  <div class="text-center mt-3">
    <a class="btn btn-principal p-grande">Ver más</a>
  </div>



</div>
<?php get_footer(); ?>