<?php 

/*
    Template Name: Content Page
*/

    // image
    $image=get_field('feature_image');
    // $picture=$image['sizes']['my_custom_size'];
    // $alt=$image['alt'];
    // $title=$image['title'];

    //file
    $file=get_field('upload_a_file');
    // $filename=$file['filename'];
    // $fileurl=$file['url'];
    
    // embed a video or twitter post
    $embed=get_field('embed_a_video');
    
get_header();?>

<section class="page">
    <div class="container">
        <h1><?php the_title()?></h1>

        <?php if(have_posts()): while(have_posts()):the_post(); ?>

        <?php the_content();?>

        <?php  endwhile; endif;?>


        <!-- Image -->
        <?php if($image): ?>
        <p><?php echo $title ?></p>
        <img src="<?php echo $picture;?>" class="img-fluid" alt="<?php  echo $alt?>"></img>
        <!-- <?php  var_dump($image);?> -->
        <?php endif; ?>

        <!-- File -->
        <?php if($file): ?>
        <a href="<?php echo $fileurl;?>" download>Dowload the image </a>
        <?php endif; ?>

        <!-- Embed a video or twitter post -->
        <?php if($embed):?>
        <?php echo $embed; ?>
        <?php endif;?>
    </div>
</section>



<?php get_footer();?>