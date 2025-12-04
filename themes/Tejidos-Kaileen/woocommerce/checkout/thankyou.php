<?php
defined('ABSPATH') || exit;

// WooCommerce pasa $order automáticamente si este archivo se carga dentro del endpoint.
// En caso de que NO venga, lo recuperamos manualmente.
if (!isset($order) || !is_a($order, 'WC_Order')) {
    $order_id = absint( get_query_var('order-received') );
    $order = wc_get_order($order_id);
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

    <!-- Aquí podís dejar el carrusel que ya tenías tal cual -->

</main>
