<?php get_header();

    $locations=get_field('locations');
    $related_post=get_field('related_post');
?>

<section class="page">
    <div class="container">

        <h1><?php the_title();?></h1>
        <!-- <?php  foreach($locations as $location):?>

        <img src="<?php echo get_the_post_thumbnail_url($location->ID, 'thumbnail'); ?>">

        <a href="<?php echo get_page_link($location->ID);?>">
            <h4><?php echo $location->post_title; ?></h4>
        </a>


        <?php echo($location->post_content);?>

        <?php endforeach; ?> -->

        <?php foreach($locations as $post):?>
        <?php setup_postdata($post); ?>
        <?php echo the_title()?>
        <?php the_field('address');?>

        <?php  wp_reset_postdata(); endforeach;?>

        <?php if($related_post):?>
        <ul class="list-group">

            <?php foreach($related_post as $post): ;?>
            <li class="list-group-item">
                <a href="<?php echo get_the_permalink($post->ID); ?>">
                    <?php echo $post->post_title; ?>
                </a>
                <?php echo $post->post_content; ?>

            </li>

            <?php endforeach;?>
        </ul>
        <?php endif; ?>
    </div>

</section>
<?php get_footer(); ?>