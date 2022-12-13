<?php get_header();

    $locations=get_field('locations');
    $link=get_field('link');
    $page_link=get_field('page_link');
?>

<section class="page">
    <div class="container">

        <h1><?php the_title();?></h1>
        <?php
        
            $args=[
                'post_type'=>'members',
                'meta_query'=>[

                    'key'=>'locations',
                    'value'=> '"'. get_the_ID() . '"',
                    'compare'=>'LIKE',
                ]
                ];

            $team_members=get_posts($args);
        ?>

        <?php foreach($team_members as $member): ?>
        <a href="<?php echo get_permalink($member->ID) ;?>">
            <h3><?php echo $member->post_title ;?></h3>
        </a>
        <?php endforeach; ?>

        <?php if($link):?>
        <a href="<?php echo $link['url']?>" target="<?php echo $link['target'];?>">
            <?php echo $link['title'] ?>
        </a>
        <?php endif;?>
        <br>
        <a href="<?php echo $page_link;?>">
            Click here
        </a>
    </div>

</section>
<?php get_footer(); ?>