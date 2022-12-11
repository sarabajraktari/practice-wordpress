<?php get_header();
    $title=get_field('page_title');
    $description=get_field('description');
    $other_description=get_field('other_description');
    $my_input=get_field('my_input');
?>
<h1><?php the_title() ?></h1>
<div class="row">
    <?php 
        $args_cat=array(
            'include'=>'10,7,9'
        );
        $categories=get_categories($args_cat);

        foreach($categories as $category):
            $args=array(
                'type'=>'post',
                'posts_per_page'=>1,
                'category__in'=>$category->term_id
                
    
            );
             $lastBlog=new WP_Query($args);
            if( $lastBlog->have_posts()):
                while( $lastBlog->have_posts()):$lastBlog->the_post(); ?>

    <div class="col-xs-12 col-sm-4">
        <?php get_template_part('content','featured');?>
    </div>
    <?php endwhile;
            endif;
            wp_reset_postdata();
            
            
        endforeach;
        ?>



</div>
<?php if($title):?>
<h1><?php 
        echo $title;
    ?></h1>
<?php endif;?>

<?php if($description):?>
<?php echo nl2br($description);?>
<?php endif; ?>

<?php if($other_description):?>
<?php echo $other_description;?>
<?php endif;?>

<?php if($my_input):?>
<?php echo $my_input;?>
<?php endif;?>
<div class="row">


    <div class="col-xs-12 col-sm-8">
        <?php 
         if( have_posts() ):
            while( have_posts()):the_post(); ?>

        <!-- this function include content file and based on post formats -->
        <?php  get_template_part('content',get_post_format());?>

        <?php endwhile;
            endif;
            // PRINT OTHER 2 POSTS NOT THE FIRST ONE
            // $args=array(
            //     'type'=>'post',
            //     'post_per_page'=>2,
            //     'offset'=>1
            // );
            // $lastBlog=new WP_Query($args);
            // if( $lastBlog->have_posts()){
            //     while( $lastBlog->have_posts()){
            //         $lastBlog->the_post();
            //         get_template_part('content',get_post_format());
            //     }
            // }
            // wp_reset_postdata();
        ?>

        <?php

            // PRINT ONLY TUTORIALS
            // $lastBlog=new WP_Query('type=post&posts_per_page=-1&cat=9');
            // if( $lastBlog->have_posts()){
            //     while( $lastBlog->have_posts()){
            //         $lastBlog->the_post();
            //         get_template_part('content',get_post_format());
            //     }
            // }
            // wp_reset_postdata();


        ?>


    </div>

    <div class="col-xs-12 col-sm-4">

        <?php get_sidebar();?>
    </div>
</div>
<?php get_footer();?>