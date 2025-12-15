<?php

function kaileen_setup()
{
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

}
add_action('after_setup_theme', 'kaileen_setup');

function registrar_menus() {
    register_nav_menus(array(
        'menu_principal'  => 'Menú principal',
        'menu_secundario' => 'Menú secundario',
        'menu_movil'      => 'Menú móvil',
        'menu_footer'     => 'Menú footer'
    ));
}
add_action('after_setup_theme', 'registrar_menus');


function kaileen_scripts()
{

    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');


    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css');


    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Syne:wght@400..800&display=swap', [], null);


    wp_enqueue_style('kaileen-style', get_template_directory_uri() . '/assets/css/estilo.css');




    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', [], null, true);

    wp_enqueue_script('kaileen-js', get_template_directory_uri() . '/assets/js/script.js', [], null, true);
}


add_action('wp_enqueue_scripts', 'kaileen_scripts');









/*de aca pa abajo son los que agregue para enlazar los estilos de cada pagina y tambien enlazar conm query productos del woocomerce*/







function kaileen_carrito_styles()
{
    if (is_cart()) {
        wp_enqueue_style('carrito', get_template_directory_uri() . '/assets/css/carrito.css');
    }
}
add_action('wp_enqueue_scripts', 'kaileen_carrito_styles');




function kaileen_checkout_styles()
{
    if (is_page_template('checkout.php')) {
        wp_enqueue_style('checkout', get_template_directory_uri() . '/assets/css/check.css');
    }
}
add_action('wp_enqueue_scripts', 'kaileen_checkout_styles');



function kaileen_enqueue_styles()
{
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css');
    wp_enqueue_style('estilo', get_template_directory_uri() . '/assets/css/estilo.css');
    wp_enqueue_style('compra-exitosa', get_template_directory_uri() . '/assets/css/compra-exitosa.css');
}
add_action('wp_enqueue_scripts', 'kaileen_enqueue_styles');




/**/


function tk_agregar_soporte_woocommerce()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'tk_agregar_soporte_woocommerce');

add_action('after_setup_theme', function () {
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
});


if (current_user_can('administrator')) {
    return;
} else {
    add_action('admin_menu', function () {
        remove_menu_page('edit.php'); // Entradas
        remove_menu_page('edit-comments.php'); // Comentarios
        remove_menu_page('themes.php'); // Apariencia
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('tools.php'); // Herramientas
        remove_menu_page('options-general.php'); // Ajustes
    });
}

add_action('pre_get_posts', function ($query) {

  if (
    !is_admin() ||
    !$query->is_main_query() ||
    current_user_can('administrator')
  ) {
    return;
  }

  // Solo Gestor de la tienda
  if (current_user_can('manage_woocommerce')) {
    $query->set('post__not_in', [8 , 9, 10, 11, 3, 7]);
  }

});

add_action('pre_get_posts', function ($query) {
  if (!is_admin() && $query->is_main_query() && $query->is_search()) {
    $query->set('post_type', 'product');
  }
});


add_filter('nav_menu_link_attributes', function ($atts) {
    if (isset($atts['class'])) {
        $atts['class'] .= ' nav-link';
    } else {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}, 10);

/* Agrega class="nav-item" a los <li> */
add_filter('nav_menu_css_class', function ($classes) {
    $classes[] = 'nav-item';
    return $classes;
}, 10);



