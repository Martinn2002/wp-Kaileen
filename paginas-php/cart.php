
<?php
/* Template Name: Carrito Personalizado */
get_header();


defined('ABSPATH') || exit;


?>

<main class="contenedor-carrito">

    <!-- Encabezado -->
    <section class="encabezado-carrito">
        <div class="decoracion-linea"></div>
        <h1 class="titulo-carrito">Carrito</h1>
    </section>

    <!-- Lista de productos -->
    <section class="lista-productos">
        <?php if ( WC()->cart->get_cart_contents_count() > 0 ) : ?>
            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                $_product   = $cart_item['data'];
                $product_id = $cart_item['product_id'];
                $product_name = $_product->get_name();
                $product_link = $_product->is_visible() ? $_product->get_permalink() : '';
                $thumbnail = $_product->get_image();
                $quantity = $cart_item['quantity'];
                $price = WC()->cart->get_product_subtotal($_product, $quantity);
                ?>
                
                <div class="card-producto">
                    <?php if ( $product_link ) : ?>
                        <a href="<?php echo esc_url( $product_link ); ?>">
                            <?php echo $thumbnail; ?>
                        </a>
                    <?php else: ?>
                        <?php echo $thumbnail; ?>
                    <?php endif; ?>

                    <div class="info-producto">
                        <div class="cabecera-producto">
                            <h2 class="nombre-producto"><?php echo esc_html( $product_name ); ?></h2>
                            <a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>" class="boton-eliminar" aria-label="Eliminar <?php echo esc_attr( $product_name ); ?>">&times;</a>
                        </div>
                        <p class="descripcion-producto">
                            <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                        </p>
                        <p class="precio-producto">
                            <?php echo wp_kses_post( $price ); ?>
                        </p>
                        <div class="cantidad-producto">
                            <?php
                            echo woocommerce_quantity_input( array(
                                'input_name'  => "cart[{$cart_item_key}][qty]",
                                'input_value' => $quantity,
                                'max_value'   => $_product->get_max_purchase_quantity(),
                                'min_value'   => 0,
                                'product_name'=> $product_name,
                            ), $_product, false );
                            ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <p>Tu carrito está vacío.</p>
        <?php endif; ?>
    </section>

    <!-- Total de la compra -->
    <section class="total-carrito">
        <p>Total: <span class="monto-total"><?php echo WC()->cart->get_cart_total(); ?></span></p>
    </section>

    <!-- Botón para pagar -->
    <div class="contenedor-boton">
        <a href="<?php echo wc_get_checkout_url(); ?>" class="boton-pagar">Pagar</a>
    </div>

</main>

<?php
get_footer();
?>
