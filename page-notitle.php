<!-- We can use other name for file but with template name we can connect it in wordpress  -->
<?php 
/*
    Template Name: Page No Title
*/
get_header();?>

<!-- contact page -->
<?php 
            if( have_posts() ):
                while( have_posts()):the_post(); ?>
<h1>This is my Static Title</h1>
<small>Posted on: <?php the_time();?>, in <?php the_category(); ?></small>
<p> <?php the_content(); ?> </p>
<hr>
<?php endwhile;

            endif; ?>

<?php get_footer();?>