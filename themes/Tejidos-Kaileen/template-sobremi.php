
<?php
/* Template Name: Sobre Mi */
get_header();
?>
<main>
    <?php

$content = get_post_field('post_content', get_the_ID());
$blocks  = parse_blocks($content);

$total   = count($blocks);
$middle  = intval($total / 2);


$first_half  = array_slice($blocks, 0, $middle);
$second_half = array_slice($blocks, $middle);

function render_block_list($blocks_array) {
    foreach ($blocks_array as $block) {
        echo render_block($block);
    }
}
?>
    <div class="container">
        <h1 class="titulo-seccion">Sobre Mi</h1>
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/kaileen.jpeg' ?>" alt="Kaileen junto a sus tejidos">
            </div>
            <div class="col-12 col-md-6">
              <p class="m5">  <?php render_block_list($first_half);?> </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
               <a href="<?php echo get_term_link('Modelo', 'product_cat'); ?>"> Catálogo </a>
               <img src="<?php echo get_template_directory_uri() . '/assets/img/perchero.jpeg' ?>" alt="">
            </div>
            <div class="col-12 col-md-6">
                <a href=""> Disponibles </a>
                <img src="<?php echo get_template_directory_uri() . '/assets/img/kaileen.jpeg' ?>" alt="">
            </div>
        </div>
        
        <div class="col-6 col-md-12">
            <?php> render_block_list($first_half);?>
        </div>
    </div>


</main>
<?php get_footer() ?>