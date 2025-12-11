
<?php
/* Template Name: Sobre Mi */
get_header();
?>
<main>
    
    <div class="container">
        <h1 class="titulo-seccion">Sobre Mi</h1>
        <div class="row">
            <div class="col-12 col-md-6 foto-sobremi">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/kaileen.jpeg' ?>" alt="Kaileen junto a sus tejidos">
            </div>
            <div class="col-12 col-md-6">
              <p class="m5"> <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?> </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 w-50">
               <a href="<?php echo get_term_link('Modelo', 'product_cat'); ?>"> Catálogo </a>
               <img src="<?php echo get_template_directory_uri() . '/assets/img/perchero.jpeg' ?>" alt="">
            </div>
            <div class="col-12 col-md-6 w-50">
                <a href=""> Disponibles </a>
                <img src="<?php echo get_template_directory_uri() . '/assets/img/kaileen.jpeg' ?>" alt="">
            </div>
        </div>
        
        
    </div>


</main>
<?php get_footer() ?>