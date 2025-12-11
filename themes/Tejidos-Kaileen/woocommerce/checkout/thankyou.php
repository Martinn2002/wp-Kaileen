<?php
get_header();
defined('ABSPATH') || exit;

// WooCommerce pasa $order automáticamente si este archivo se carga dentro del endpoint.
// En caso de que NO venga, lo recuperamos manualmente.
if (!isset($order) || !is_a($order, 'WC_Order')) {
  $order_id = absint(get_query_var('order-received'));
  $order = wc_get_order($order_id);
}

if ($order && $order->has_status('failed')) {
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

            if (! wc_has_notice('', 'error')) {
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
<div class="container">
  <main class="contenedor-gracias">

    <header class="encabezado mt-3">
      <h1 class="text-center">¡Gracias por tu compra!</h1>
      <h2>Tu compra fue recibida</h2>
      <h3>Estoy preparando tu pedido</h3>
    </header>

    <!-- PROGRESO -->
    <p class="p-pequeno mt-1 text-center">Preparación</p>

    <section class="progreso">

      <div class="barra mx-auto">
        <div class="barra-llena" style="width:30%"></div>
      </div>

      <div class="hitos d-flex justify-content-between mt-3">

        <div class="hito activo text-center">
          <div class="icono">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/compra-lista.svg" width="40" alt="">
          </div>
          <p class="p-pequeno">En preparación</p>
        </div>

        <div class="hito text-center">
          <div class="icono">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/camion.svg" width="40" alt="">
          </div>
          <p class="p-pequeno">Enviado</p>
        </div>

        <div class="hito text-center">
          <div class="icono">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/caja-check.svg" width="40" alt="">
          </div>
          <p class="p-pequeno">Entregado</p>
        </div>

      </div>

    </section>

    <h3 class="aviso-email text-center mt-3 mb-1">
      Actualizaremos el estado de tu compra a través de correo electrónico.
    </h3>

    <!-- RESUMEN DEL PEDIDO -->
    <section class="resumen-fondo"></section>

</div>

<div class="overlay">
  <div class="container">
    <div class="tarjetas-resumen">

      <article class="tarjeta-checkout resumen-pedido">
        <h3 class="tarjeta-titulo">Resumen del pedido</h3>
        <ul class="lista-resumen">
          <?php foreach ($order->get_items() as $item) : ?>
            <li>
              <?php echo $item->get_name(); ?> — Cantidad: <?php echo $item->get_quantity(); ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </article>

      <article class="tarjeta-checkout fecha-entrega">
        <h3 class="tarjeta-titulo">Fecha estimada</h3>
        <p class="valor-fecha">10 días aprox.</p>
      </article>

      <article class="tarjeta-checkout numero-pedido">
        <h3 class="tarjeta-titulo">Número de pedido</h3>
        <p class="valor-orden">#<?php echo $order->get_order_number(); ?></p>
      </article>
    </div>
  </div>
</div>

<div class="container">

  <h3 class="mensaje-artesanal text-center mt-4">
    Cada pieza de Tejidos Kaileen se elabora a mano, con atención a cada punto.
  </h3>

  <div>
    <h2 class="mt-2 titulo-seccion">Sobre Mi</h2>
    <p class="p-grande">Conoce la historia detrás de mí y mis tejidos.</p>
    <img class="imagen-sobre-mi" src="<?php echo get_template_directory_uri(); ?>/assets/img/kaileen.jpeg" alt="">
    <div class="text-center mt-2">
      <a class="btn btn-principal" href="<?php echo site_url('sobre-mi'); ?>">Sobre Mi</a>
    </div>
  </div>

</div>

</main>

<?php get_footer(); ?>