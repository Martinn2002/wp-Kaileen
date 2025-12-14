
<?php
/* Template Name: Sobre Mi */
get_header();
?>
<main>
    
    <div class="container">
        <h1 class="titulo-seccion">Sobre Mi</h1>
        <div class="row">
            <div class="col-6 ">
                <img class="foto-sobremi" src="<?php echo get_template_directory_uri() . '/assets/img/kaileen.jpeg' ?>" alt="Kaileen junto a sus tejidos">
            </div>
            <div class="col-6">
              <p class="m-5"> <?php
                           if ( have_posts() ) :
                              while ( have_posts() ) : the_post();
                                          the_content();
                          endwhile;
                     endif;
                 ?> </p>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <a href="<?php echo esc_url( get_term_link('Modelo', 'product_cat') ); ?>" class="position-relative d-block text-white text-decoration-none">
                     <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/perchero.jpeg' ); ?>" class="img-fluid">
                        <span class="position-absolute bottom-0 start-0 p-3 bg-dark bg-opacity-50">
                        Catálogo</span>
                </a>

             </div>
             <div class="col-6">
                <a href="<?php echo esc_url( get_term_link('Disponibles', 'product_cat') ); ?>" class="position-relative d-block text-white text-decoration-none">
                     <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/tejidos-stand.jpeg' ); ?>" class="img-fluid">
                        <span class="position-absolute bottom-0 start-0 p-3 bg-dark bg-opacity-50">
                        Disponibles</span>
                 </a>
             </div>
        </div>
        
        
    </div>


</main>
<?php get_footer() ?>