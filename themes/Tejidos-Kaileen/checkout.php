
<?php

defined('ABSPATH') || exit;

/*
 * Template Name: Checkout Personalizado Completo
 */

get_header();
if ( is_wc_endpoint_url( 'order-received' ) ) {
    wc_get_template( 'checkout/thankyou.php', array( 'order_id' => get_query_var('order-received') ) );
    return;
}



$checkout = WC()->checkout();



// Si el carrito está vacío → redirigir
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'Debes iniciar sesión para continuar.' ) ) );
    return;
}
?>

<main class="contenedor-checkout">

  <div class="encabezado">
    <div class="linea-vertical"></div>
    <h1 class="titulo">Check out</h1>
    
  </div>

  <!-- RESUMEN DE PRODUCTOS -->
<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
    $_product   = $cart_item['data'];
    $qty        = $cart_item['quantity'];
    $thumb      = $_product->get_image();
    $name       = $_product->get_name();
    $price      = $_product->get_price_html();
    $product_id = $cart_item['product_id'];

    // obtener variaciones en HTML crudo
    $raw_attributes = wc_get_formatted_cart_item_data( $cart_item );

    // convertir a items en columnas
    $attr_html = "";
    if ( $raw_attributes ) {
        // separa cada <p> o <div> según cómo WooCommerce lo entregue
        $lines = preg_split('/<br\s*\/?>/i', $raw_attributes);

        foreach( $lines as $line ) {
            if ( trim($line) !== "" ) {
                $attr_html .= '<div class="variacion-item">'.$line.'</div>';
            }
        }
    }
?>
<section class="tarjeta-resumen mb-1">

  <div class="imagen-wrap">
      <?php echo $thumb; ?>
  </div>

  <div class="meta-producto">
    
      <h2 class="nombre-producto"><?php echo esc_html( $name ); ?></h2>

      <p class="precio-producto"><?php echo $price; ?></p>

      <?php if ( $attr_html ) : ?>
        <div class="variaciones-grid">
          <?php echo $attr_html; ?>
        </div>
      <?php endif; ?>

  </div>

</section>
<?php endforeach; ?>


  <!-- TOTAL -->
  <section class="total">
    <p class="texto-total">
      Total de la compra:
      <span class="monto-total"><?php wc_cart_totals_order_total_html(); ?></span>
    </p>
    <?php  do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
  </section>

  <!-- FORMULARIO OFICIAL DE WOOCOMMERCE -->
   <div class="carta-pago">


  <form name="checkout" method="post" class="formulario" action="<?php echo esc_url( wc_get_checkout_url() ); ?>">

    <?php if ( $checkout->get_checkout_fields() ) : ?>

      <fieldset class="bloque">
        <legend class="leyenda">Rellena tus datos para el envío</legend>
      </fieldset>

      <div class="woocommerce-billing-fields">
        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

        <div class="woocommerce-billing-fields__field-wrapper">
            <?php
            foreach ( $checkout->get_checkout_fields( 'billing' ) as $key => $field ) {
                woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
            }
            ?>
        </div>

      </div>

      <div class="woocommerce-shipping-fields">
        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
          <?php do_action( 'woocommerce_checkout_shipping' ); ?>
        <?php endif; ?>
      </div>

      <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

    <?php endif; ?>

       </div>
    <!-- MÉTODOS DE PAGO -->
    <fieldset class="bloque opciones-pago carta-pago-final">
      <legend class="leyenda">Opciones de pago</legend>

      <?php woocommerce_checkout_payment(); ?>

    </fieldset>

    <p class="nota">Para realizar un pedido personalizado es necesario un abono mínimo del 50% del total.</p>
    <?php do_action( 'woocommerce_review_order_after_payment' ); ?>

  </form>

</main>


<?php get_footer(); ?>
