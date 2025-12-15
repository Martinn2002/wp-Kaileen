<?php
/**
 * Template Name: Perfil de Usuario Personalizado (Optimizado)
 * Description: Plantilla personalizada y semántica para la vista de perfil de usuario.
 * Requires: WooCommerce, funciones de Font Awesome/Remix Icons (ri-) y manejo de imágenes.
 */


if ( ! is_user_logged_in() ) {
    auth_redirect(); 
}

get_header(); 


$current_user = wp_get_current_user();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main" aria-label="Sección de Perfil de Usuario">

        <section class="perfil-usuario-contenedor">

            <header class="text-center mb-4">
                <div class="perfil-usuario-foto-wrap mb-2" id="perfil-usuario-wrap-foto">
                    <?php 
                    $avatar_url = get_avatar_url( $current_user->ID );
                    ?>
                    <img id="perfil-usuario-foto-img" src="<?php echo esc_url( $avatar_url ); ?>" alt="Foto de perfil de <?php echo esc_attr( $current_user->user_login ); ?>">
                    
                    <button id="perfil-usuario-cambiar-foto" class="perfil-usuario-cambiar-foto" title="Cambiar foto">
                        <i class="ri-image-edit-line"></i>
                    </button>
                </div>
                <h1 class="perfil-usuario-nombre" id="perfil-usuario-nombre"><?php echo esc_html( $current_user->user_login ); ?></h1>
            </header>
            
            <div class="perfil-usuario-menu" role="tablist">

                <article class="perfil-usuario-acordeon" id="perfil-usuario-acordeon-datos">
                    <button class="perfil-usuario-acordeon-encabezado" role="tab" aria-expanded="false" aria-controls="content-datos" tabindex="0">
                        <div class="perfil-usuario-acordeon-izq">
                            <div class="perfil-usuario-icono">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/cambiar-datos.png" alt="Icono usuario">
                            </div>
                            <div>
                                <h2 class="perfil-usuario-titulo">Cambiar Datos</h2>
                                <p class="perfil-usuario-subtitulo">No Puedes dejar campos vacíos</p>
                            </div>
                        </div>
                        <div class="perfil-usuario-flecha" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </div>
                    </button>
                    <div class="perfil-usuario-contenido" id="content-datos" role="tabpanel" aria-hidden="true">
                        <div class="perfil-usuario-contenido-inner">
                            <form method="post" class="perfil-datos-form" action=""> 
                                
                                <div class="perfil-usuario-grupo">
                                    <label for="perfil-usuario-nombre-input">Nombre de usuario</label>
                                    <input id="perfil-usuario-nombre-input" class="perfil-usuario-input" type="text" value="<?php echo esc_attr( $current_user->user_login ); ?>" name="account_user_login">
                                </div>

                                <div class="perfil-usuario-grupo">
                                    <label for="perfil-usuario-email-input">Correo electrónico</label>
                                    <input id="perfil-usuario-email-input" class="perfil-usuario-input" type="email" value="<?php echo esc_attr( $current_user->user_email ); ?>" name="account_email">
                                </div>

                                <div class="perfil-usuario-grupo">
                                    <label for="perfil-usuario-password-new">Nueva contraseña</label>
                                    <input id="perfil-usuario-password-new" class="perfil-usuario-input" type="password" placeholder="ingresar nueva contraseña" name="password_1">
                                </div>

                                <div class="perfil-usuario-grupo">
                                    <label for="perfil-usuario-password-confirm">Confirmar nueva contraseña</label>
                                    <input id="perfil-usuario-password-confirm" class="perfil-usuario-input" type="password" placeholder="Confirmar nueva contraseña" name="password_2">
                                </div>

                                <div class="perfil-usuario-linea-separadora"></div>

                                <h3 class="perfil-usuario-subtitle-small">Ingresa tu contraseña para guardar los cambios</h3>

                                <div class="perfil-usuario-grupo">
                                    <label for="perfil-usuario-current-pass">Ingresar Contraseña</label>
                                    <input id="perfil-usuario-current-pass" class="perfil-usuario-input" type="password" placeholder="ingresar contraseña" name="password_current">
                                </div>

                                <button class="perfil-usuario-boton perfil-datos-guardar" type="submit" name="save_account_details">
                                    Cambiar Datos
                                </button>
                                
                                <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
                                <input type="hidden" name="action" value="save_account_details" />
                            </form>
                        </div>
                    </div>
                </article>

                <article class="perfil-usuario-acordeon" id="perfil-usuario-acordeon-compras">
                    <button class="perfil-usuario-acordeon-encabezado" role="tab" aria-expanded="false" aria-controls="content-compras" tabindex="0">
                        <div class="perfil-usuario-acordeon-izq">
                            <div class="perfil-usuario-icono">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/mis-compras.png" alt="Icono usuario">
                            </div>
                            <div>
                                <h2 class="perfil-usuario-titulo">Mis Compras</h2>
                                <p class="perfil-usuario-subtitulo">Tu historial de pedidos</p>
                            </div>
                        </div>
                        <div class="perfil-usuario-flecha">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#000" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </div>
                    </button>

                    <div class="perfil-usuario-contenido" id="content-compras" role="tabpanel" aria-hidden="true">
                        <div class="perfil-usuario-contenido-inner">
                            <?php
                           
                            $customer_orders = wc_get_orders( array(
                                'customer_id' => $current_user->ID,
                                'numberposts' => 5, 
                                'orderby'     => 'date',
                                'order'       => 'DESC',
                            ) );

                            if ( $customer_orders ) :
                                foreach ( $customer_orders as $customer_order ) :
                                    $order_data = $customer_order->get_data();
                                    $order_status = wc_get_order_status_name( $order_data['status'] );
                                    $order_date = wc_format_datetime( $customer_order->get_date_created(), 'd/m/y' );
                                    $order_total = $customer_order->get_formatted_order_total();
                              
                                    $items = $customer_order->get_items();
                                    $first_item = reset($items);
                                    $product = $first_item ? $first_item->get_product() : null;
                                    $product_image = $product ? $product->get_image('thumbnail') : '<div class="compra-img-placeholder"></div>';
                                    $product_name = $first_item ? $first_item->get_name() : 'Pedido #' . $customer_order->get_order_number();

                                    ?>
                                    <div class="perfil-usuario-compra-card-img">

                                        <h3 class="compra-titulo-principal"><?php echo esc_html( $product_name ); ?></h3>

                                        <div class="compra-card-content">
                                            
                                            <div class="compra-img-wrap">
                                                <?php echo $product_image; ?>
                                            </div>

                                            <div class="compra-info-datos">
                                                <div class="compra-fecha-dato">Comprado el <?php echo esc_html( $order_date ); ?></div>
                                                
                                                <div class="compra-estado-wrap">
                                                    <span class="compra-estado-label">Estado:</span>
                                                    <span class="compra-estado estado-<?php echo esc_attr( $order_data['status'] ); ?>"><?php echo esc_html( $order_status ); ?></span>
                                                </div>

                                                <div class="compra-precio"><?php echo $order_total; ?></div>
                                            </div>
                                        </div>

                                        <div class="compra-separador"></div>
                                        
                                    </div>
                                    <?php 
                                endforeach; 
                            else : ?>
                                <p>Aún no has realizado ninguna compra.</p>
                            <?php endif; ?>
                            
                            <div class="mt-3">
                                <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>" class="perfil-usuario-boton perfil-boton-secundario">Ver todas las órdenes</a>
                            </div>
                        </div>
                    </div>
                </article>

                <div class="perfil-usuario-acordeon" id="perfil-usuario-acordeon-disenos" >
                    <button class="perfil-usuario-acordeon-encabezado" role="tab" aria-expanded="false" aria-controls="content-disenos" tabindex="0">
                        <div class="perfil-usuario-acordeon-izq">
                            <div class="perfil-usuario-icono">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/mis-diseños.png" alt="Icono usuario"> 
                            </div>
                            <div>
                                <h2 class="perfil-usuario-titulo">Mis Diseños</h2>
                                <p class="perfil-usuario-subtitulo">Revisa tus tejidos personalizados</p>
                            </div>
                        </div>

                        <div class="perfil-usuario-flecha">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none"  stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </div>
                    </button>

                    <div class="perfil-usuario-contenido" id="content-disenos" role="tabpanel" aria-hidden="true">
                        <div class="perfil-usuario-contenido-inner">
                             <p>Aquí se listarán tus productos con personalización especial.</p>
                             <button class="perfil-usuario-boton perfil-boton-secundario">Crear Nuevo Diseño</button>
                        </div>
                    </div>
                </div>

                <article class="perfil-usuario-acordeon" id="perfil-usuario-acordeon-publicaciones">
                    <button class="perfil-usuario-acordeon-encabezado" role="tab" aria-expanded="false" aria-controls="content-publicaciones" tabindex="0">
                        <div class="perfil-usuario-acordeon-izq">
                            <div class="perfil-usuario-icono">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/publicaciones.png" alt="Icono usuario">
                            </div>
                            <div>
                                <h2 class="perfil-usuario-titulo">Mis Publicaciones</h2>
                                <p class="perfil-usuario-subtitulo">Revisa y gestiona tus artículos</p>
                            </div>
                        </div>
                        <div class="perfil-usuario-flecha">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                        </div>
                    </button>

                    <div class="perfil-usuario-contenido" id="content-publicaciones" role="tabpanel" aria-hidden="true">
                        <div class="perfil-usuario-contenido-inner">
                            <?php 
                          
                            $user_posts = new WP_Query( array(
                                'author'      => $current_user->ID,
                                'post_type'   => 'post',
                                'posts_per_page' => 3,
                                'post_status'   => 'publish',
                            ) );

                            if ( $user_posts->have_posts() ) :
                                while ( $user_posts->have_posts() ) : $user_posts->the_post();
                                    echo '<div class="perfil-usuario-publicacion">';
                                    echo '<h6><a href="' . get_permalink() . '">' . get_the_title() . '</a></h6>';
                                    echo '<small>' . get_the_date() . '</small>';
                                    echo '</div>';
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<p class="mb-0">Aún no has creado publicaciones.</p>';
                            endif;
                            ?>
                        </div>
                    </div>
                </article>

                <div class="perfil-usuario-acordeon perfil-usuario-logout-card" id="perfil-usuario-acordeon-logout">
                    <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="perfil-usuario-acordeon-encabezado" role="link">
                        <div class="perfil-usuario-acordeon-izq">
                            <div class="perfil-usuario-icono">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/salir.png" alt="Icono usuario"> 
                            </div>
                            <div>
                                <h2 class="perfil-usuario-titulo">Cerrar Sesión</h2>
                                <p class="perfil-usuario-subtitulo">Tu sesión se cerrará inmediatamente</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div> 
        </section> 
    </main>
</div>

<?php
get_footer();
?>