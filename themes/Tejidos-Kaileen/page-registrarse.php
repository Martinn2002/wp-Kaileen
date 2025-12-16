<?php
/*
Template Name: Registro
*/
defined('ABSPATH') || exit;

if ( is_user_logged_in() ) {
    wp_redirect( site_url('/mi-cuenta') );
    exit;
}

get_header();
?>

<main class="login-page">
    <div class="login-card">

        <p class="login-title">
            Crea tu cuenta y encuentra el chaleco perfecto, tejido especialmente para ti.
        </p>

        <?php
        echo do_shortcode('[woocommerce_my_account login="false"]');
        ?>

    </div>
</main>

<?php get_footer(); ?>