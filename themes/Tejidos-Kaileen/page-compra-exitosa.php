<?php
defined('ABSPATH') || exit;

/*
 * Template Name: Compra Exitosa
 */

get_header();
?>

<main class="contenedor-gracias container-fluid">

  <!-- Encabezado principal -->
  <header class="encabezado text-center">
    <h1 class="titulo-principal">¡Gracias por tu compra!</h1>
    <p class="subtitulo">Tu compra fue recibida</p>
    <p class="texto-pequeno">Estamos preparando tu pedido</p>
  </header>

  <!-- Barra de progreso del pedido -->
  <section class="progreso container">
    <div class="barra mx-auto">
      <div class="barra-llena" style="width:30%"></div>
    </div>

    <div class="hitos d-flex justify-content-center mt-3">
      <div class="hito activo text-center mx-3">
        <div class="icono">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/image 5.png" alt="En preparación" width="40">
        </div>
        <small>En preparación</small>
      </div>
      <div class="hito text-center mx-3">
        <div class="icono">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/image 2.png" alt="Enviado" width="40">
        </div>
        <small>Enviado</small>
      </div>
      <div class="hito text-center mx-3">
        <div class="icono">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/image 4.png" alt="Entregado" width="40">
        </div>
        <small>Entregado</small>
      </div>
    </div>
  </section>

  <!-- Aviso por email -->
  <p class="aviso-email text-center mt-3">
    Actualizaremos el estado de tu compra a través de correo electrónico.
  </p>

  <!-- Resumen del pedido -->
  <section class="resumen-fondo">
    <div class="overlay">
      <div class="tarjetas-resumen">
        <?php
        // Obtener el último pedido del usuario
        $current_user_id = get_current_user_id();
        $customer_orders = wc_get_orders(array(
          'limit' => 1,
          'customer_id' => $current_user_id,
          'orderby' => 'date',
          'order' => 'DESC'
        ));

        if (!empty($customer_orders)) :
          $order = $customer_orders[0];
        ?>
        <article class="tarjeta resumen-pedido">
          <h3 class="tarjeta-titulo">Resumen del pedido</h3>
          <ul class="lista-resumen">
            <?php foreach ($order->get_items() as $item) :
              $product_name = $item->get_name();
              $variation = wc_get_formatted_variation($item);
            ?>
              <li><?php echo esc_html($product_name . ' ' . $variation); ?></li>
            <?php endforeach; ?>
          </ul>
        </article>

        <article class="tarjeta fecha-entrega">
          <h4 class="tarjeta-titulo">Fecha estimada</h4>
          <p class="valor-fecha"><?php echo date_i18n('d \d\e F', strtotime('+7 days')); ?></p>
        </article>

        <article class="tarjeta numero-pedido">
          <h4 class="tarjeta-titulo">Número de pedido</h4>
          <p class="valor-orden"><?php echo '#' . $order->get_order_number(); ?></p>
        </article>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Mensaje intermedio -->
  <p class="mensaje-artesanal text-center my-4">
    Cada pieza de Tejidos Kaileen se elabora a mano, con atención a cada punto.
  </p>

  <!-- Catálogo dinámico -->
  <section class="seccion container">
    <div class="seccion-encabezado d-flex align-items-center">
      <div class="linea-vertical"></div>
      <h3 class="seccion-titulo ms-2">Catálogo</h3>
    </div>
    <p class="seccion-sub">Diseños disponibles para entrega inmediata.</p>

    <div id="carouselProductos" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        // Query para productos WooCommerce
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => -1
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) :
          $active = 'active';
          while ($loop->have_posts()) : $loop->the_post();
            global $product;
        ?>
            <div class="carousel-item <?php echo $active; ?>">
              <div class="row justify-content-center">
                <div class="col-10 col-md-4">
                  <div class="tarjeta-producto">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>">
                    <div class="producto-meta d-flex justify-content-between align-items-start">
                      <div class="producto-info">
                        <h3><?php the_title(); ?></h3>
                        <p class="p-grande"><?php echo wc_price($product->get_price()); ?></p>
                        <p class="p-mediano"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                      </div>
                      <button class="btn-compartir"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/compartir.png" alt=""></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php
            $active = ''; 
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselProductos" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>
  </section>

  <!-- Cuidados -->
  <section class="seccion cuidados container mt-4">
    <div class="seccion-encabezado d-flex align-items-center">
      <div class="linea-vertical"></div>
      <h3 class="seccion-titulo ms-2">Cuidados</h3>
    </div>
    <p class="seccion-sub">Conoce cómo cuidar tus Tejidos Kaileen.</p>
    <div class="fondo-cuidados position-relative">
      <img src="<?php echo get_template_directory_uri(); ?>/img/cuidados-fondo.jpg" alt="Cuidados" class="img-fondo img-fluid w-100">
      <div class="centro-boton">
        <a href="<?php echo site_url('/cuidados'); ?>" class="boton-verde claro">Ver más</a>
      </div>
    </div>
  </section>

  <!-- Sobre la marca -->
  <section class="seccion sobre-marca container mt-4">
    <div class="seccion-encabezado d-flex align-items-center">
      <div class="linea-vertical"></div>
      <h3 class="seccion-titulo ms-2">Sobre Kaileen</h3>
    </div>
    <p class="seccion-sub">Conoce la historia detrás del material.</p>
    <div class="fondo-sobre position-relative">
      <img src="<?php echo get_template_directory_uri(); ?>/img/sobre-fondo.jpg" alt="Sobre Kaileen" class="img-fondo img-fluid w-100">
      <div class="centro-boton">
        <a href="<?php echo site_url('/sobre'); ?>" class="boton-verde claro">Ver más</a>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
