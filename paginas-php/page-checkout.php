<?php
defined('ABSPATH') || exit;

/*
 * Template Name: Checkout Personalizado Completo
 */

get_header();

$checkout = WC()->checkout();
?>

<main class="contenedor-checkout">

  <div class="encabezado">
    <div class="linea-vertical"></div>
    <h1 class="titulo">Check out</h1>
  </div>

  <?php if ( WC()->cart->get_cart_contents_count() > 0 ) : ?>
    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
      $product = $cart_item['data'];
      $product_name = $product->get_name();
      $product_image = wp_get_attachment_url( $product->get_image_id() );
      $product_quantity = $cart_item['quantity'];
      $product_price = wc_price( $product->get_price() );
      $attributes = $product->get_attributes();
    ?>

    <!-- Tarjeta del producto (solo imagen y eliminar) -->
    <section class="tarjeta-resumen">
      <div class="imagen-wrap">
        <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_name); ?>" class="imagen-producto">
      </div>
      <a href="<?php echo wc_get_cart_remove_url($cart_item_key); ?>" class="boton-eliminar" aria-label="Eliminar producto">&times;</a>
      <div class="meta-producto">
        <h2 class="nombre-producto"><?php echo esc_html($product_name); ?></h2>
        <p class="modelo-producto">Cantidad: <?php echo $product_quantity; ?></p>
      </div>
    </section>

    <!-- Detalles debajo de la tarjeta -->
    <section class="detalles">
      <h3 class="subtitulo">Detalles</h3>
      <dl class="grid-atributos">
        <?php
        if (!empty($attributes)) {
          foreach ($attributes as $attr_name => $attr_obj) {
            $label = wc_attribute_label($attr_name);
            if ($attr_obj->is_taxonomy()) {
              $values = wc_get_product_terms($product->get_id(), $attr_name, array('fields' => 'names'));
              $value = implode(', ', $values);
            } else {
              $value = $attr_obj->get_options();
              $value = implode(', ', $value);
            }
            echo '<div class="fila"><dt>'.esc_html($label).'</dt><dd>'.esc_html($value).'</dd></div>';
          }
        } else {
          echo '<div class="fila"><dt>Detalles</dt><dd>—</dd></div>';
        }
        ?>
      </dl>

      <div class="valor-producto">
        <span class="texto-valor">Valor:</span>
        <span class="monto-valor"><?php echo $product_price; ?></span>
      </div>
    </section>

    <?php endforeach; ?>
  <?php else: ?>
    <p>Tu carrito está vacío.</p>
  <?php endif; ?>

  <hr class="divisor">

  <!-- Total -->
  <section class="total">
    <p class="texto-total">
      Total de la compra:
      <span class="monto-total"><?php echo WC()->cart->get_cart_total(); ?></span>
    </p>
  </section>

  <!-- Formulario -->
  <form class="formulario" method="post" action="<?php echo esc_url( wc_get_checkout_url() ); ?>">

    <!-- Correo electrónico -->
    <fieldset class="bloque">
      <legend class="leyenda">Correo electrónico para enviar el detalle</legend>
      <label class="label">
        <?php
        woocommerce_form_field('billing_email', array(
          'type' => 'email',
          'required' => true,
          'placeholder' => 'tu@correo.com',
          'class' => array('input'),
          'label_class' => array('label')
        ), $checkout->get_value('billing_email'));
        ?>
      </label>
    </fieldset>

    <!-- Dirección de envío -->
    <fieldset class="bloque">
      <legend class="leyenda">Dirección de envío</legend>
      <?php
      $fields = array(
        'first_name' => 'Nombre',
        'last_name'  => 'Apellido',
        'address_1'  => 'Dirección',
        'city'       => 'Ciudad',
        'state'      => 'Región',
        'country'    => 'País / Región',
        'phone'      => 'Teléfono'
      );
      foreach($fields as $key => $label){
        woocommerce_form_field('billing_'.$key, array(
          'type' => ($key=='phone')?'tel':'text',
          'required' => true,
          'placeholder' => $label,
          'class' => array('input'),
          'label_class' => array('label')
        ), $checkout->get_value('billing_'.$key));
      }
      ?>
    </fieldset>

<fieldset class="bloque opciones-pago">
  <legend class="leyenda">Opciones de pago</legend>

  <?php
  $available_gateways = WC()->payment_gateways->get_available_payment_gateways();

  if ( ! empty( $available_gateways ) ) :
      foreach ( $available_gateways as $gateway ) : ?>
          <label class="opcion-pago">
              <input type="radio" 
                     name="payment_method" 
                     value="<?php echo esc_attr( $gateway->id ); ?>"
                     <?php checked( WC()->session->get('chosen_payment_method'), $gateway->id ); ?> >
              <span><?php echo esc_html( $gateway->get_title() ); ?></span>
          </label>
      <?php endforeach; 
  else :
      echo '<p>No hay métodos de pago disponibles.</p>';
  endif;
  ?>
</fieldset>


    <p class="nota">Para realizar un pedido personalizado es necesario un abono mínimo del 50% del total.</p>

    <div class="contenedor-boton">
      <button type="submit" class="boton-accion">Realizar pedido</button>
    </div>

  </form>

</main>

<?php get_footer(); ?>
