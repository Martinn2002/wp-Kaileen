<?php
/*
Template Name: Login
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
            Inicia sesión para continuar con tus pedidos o personalizar tus tejidos favoritos.
        </p>

        <?php
        echo do_shortcode('[woocommerce_my_account registration="false"]');
        ?>

        <p class="login-helper">
            ¿Aún no tienes cuenta?<br>
            <a href="<?php echo esc_url( site_url('/registrarse') ); ?>" class="link-recuperar">
                Regístrate
            </a>
        </p>

    </div>
</main>

<?php get_footer(); ?>