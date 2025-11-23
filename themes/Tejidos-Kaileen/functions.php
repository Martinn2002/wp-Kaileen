<?php

function kaileen_setup() {
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    
    register_nav_menus([
        'menu-principal' => __('Menú Principal', 'kaileen'),
    ]);
}
add_action('after_setup_theme', 'kaileen_setup');


function kaileen_scripts() {
    
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

    
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css');

    
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Syne:wght@400..800&display=swap', [], null);

    
    wp_enqueue_style('kaileen-style', get_template_directory_uri() . '/assets/css/estilo.css');

    
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', [], null, true);

    wp_enqueue_script('kaileen-js', get_template_directory_uri() . '/assets/js/script.js', [], null, true);

}
add_action('wp_enqueue_scripts', 'kaileen_scripts');






function tk_agregar_soporte_woocommerce() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'tk_agregar_soporte_woocommerce');

add_action( 'after_setup_theme', function() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
});
