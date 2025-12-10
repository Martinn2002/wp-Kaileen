<?php
 get_header();
defined('ABSPATH') || exit;

// WooCommerce pasa $order automáticamente si este archivo se carga dentro del endpoint.
// En caso de que NO venga, lo recuperamos manualmente.
if (!isset($order) || !is_a($order, 'WC_Order')) {
    $order_id = absint( get_query_var('order-received') );
    $order = wc_get_order($order_id);
}

if ( $order && $order->has_status('failed') ) {
    ?>
    <div class="container">
    <div class="row mt-2 text-center">
        <div class="col-md-4">
            <h1>Ups! Algo Salió Mal</h1>
            <h2 class="text-start mt-1">
                Parece que hubo un problema al procesar el pago. Pero no te preocupes, tu carrito sigue guardado.
            </h2>
        </div>

        <div class="col-md-8">
            <div class="tarjeta-error mt-2 d-flex justify-content-center align-items-center flex-column">
                <div class="circulo d-flex justify-content-center align-items-center">
                    <img class="icono-error-usuario" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/iconos/error.svg" alt="">
                </div>

               <div class="p-grande texto-carta-error mt-1">
    <?php 
    wc_print_notices();

    if ( ! wc_has_notice( '', 'error' ) ) {
        echo '<p>Ocurrió un problema al procesar tu pago. Inténtalo nuevamente.</p>';
    }
    ?>
</div>

            </div>
        </div>
    </div>

    <div class="row mt-3">
        <h3>Se Recomienda</h3>
    </div>
</div>

<div class="row">
    <div class="fondo-pag-error">
        <div class="container">
            <div class="recomendacion-error col-md-4 mt-2 row justify-content-around align-items-center">
                <p class="p-grande col-6">Verificar los datos de tu tarjeta</p>
                <img class="text col-6" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/iconos/tarjeta.svg" alt="">
            </div>

            <div class="recomendacion-error col-md-4 mt-2 mb-2 row justify-content-around align-items-center">
                <img class="icono-error col-6" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/iconos/globe2.svg" alt="">
                <p class="p-grande col-6">Revisar tu conexión a internet</p>
            </div>

            <div class="recomendacion-error col-md-4 mb-2 row justify-content-around align-items-center">
                <p class="p-grande col-6">Si no funciona, intenta con otro método de pago</p>
                <img class="icono-error col-6" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/iconos/tarjetas.svg" alt="">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <a class="btn btn-principal mt-2" href="#">Reintentar</a>
        <a class="btn btn-principal mt-2" href="<?php echo wc_get_cart_url(); ?>">Volver al Carrito</a>
    </div>
</div>

    <?php
    get_footer();
    return;
}

?>

<main class="contenedor-gracias container">

    <header class="encabezado text-center">
      <h1>¡Gracias por tu compra!</h1>
      <p class="subtitulo">Tu compra fue recibida</p>
      <p class="p-pequeno">Estoy preparando tu pedido</p>
    </header>

    <!-- PROGRESO -->
    <section class="progreso container">
      <div class="barra mx-auto">
        <div class="barra-llena" style="width:30%"></div>
      </div>

      <div class="hitos d-flex justify-content-center mt-3">
        <div class="hito activo text-center mx-3">
          <div class="icono"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/image5.png" width="40"></div>
          <small>En preparación</small>
        </div>

        <div class="hito text-center mx-3">
          <div class="icono"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/image2.png" width="40"></div>
          <small>Enviado</small>
        </div>

        <div class="hito text-center mx-3">
          <div class="icono"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/image4.png" width="40"></div>
          <small>Entregado</small>
        </div>
      </div>
    </section>

    <p class="aviso-email text-center mt-3">
      Actualizaremos el estado de tu compra a través de correo electrónico.
    </p>

    <!-- RESUMEN DEL PEDIDO -->
    <section class="resumen-fondo">
      <div class="overlay">
        <div class="tarjetas-resumen">

          <article class="tarjeta resumen-pedido">
            <h3 class="tarjeta-titulo">Resumen del pedido</h3>
            <ul class="lista-resumen">

              <?php foreach ($order->get_items() as $item): ?>
                <li>
                  <?php echo $item->get_name(); ?>
                  <?php echo " — Cantidad: " . $item->get_quantity(); ?>
                </li>
              <?php endforeach; ?>

            </ul>
          </article>

          <article class="tarjeta fecha-entrega">
            <h4 class="tarjeta-titulo">Fecha estimada</h4>
            <p class="valor-fecha">10 días aprox.</p>
          </article>

          <article class="tarjeta numero-pedido">
            <h4 class="tarjeta-titulo">Número de pedido</h4>
            <p class="valor-orden">#<?php echo $order->get_order_number(); ?></p>
          </article>

        </div>
      </div>
    </section>

    <p class="mensaje-artesanal text-center my-4">
      Cada pieza de Tejidos Kaileen se elabora a mano, con atención a cada punto.
    </p>


</main>

<?php get_footer() ?>