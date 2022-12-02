<!-- We can use id like 17 number or slung name page-about-me -->
<?php get_header();?>


<?php 
    if( have_posts() ):
        while( have_posts()):the_post(); ?>

<p> <?php the_content(); ?> </p>

<h1> <?php the_title(); ?> </h1>
<hr>
<?php endwhile;

                endif; ?>

<?php get_footer();?>