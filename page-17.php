<!-- We can use id like 17 number or slung name page-about-me -->
<?php get_header();?>

<div class="row">
    <div class="col-xs-12 col-sm-8">
        <?php 
    if( have_posts() ):
        while( have_posts()):the_post(); ?>

        <p> <?php the_content(); ?> </p>

        <h1> <?php the_title(); ?> </h1>
        <hr>
        <?php endwhile;

                endif; ?>
    </div>

    <div class="col-xs-12 col-sm-4">
        <?php get_sidebar();?>
    </div>

    <?php get_footer();?>