<?php 

/*
    Template Name: Options
*/

$colours=get_field('choose_your_colour');
$flavours=get_field('choose_a_flavour');
$consent=get_field('do_you_consent');
$where = get_field('where_do_you_want_to_go_');
$question=get_field('are_you_learning_anything');
get_header();?>

<section class="page">
    <div class="container">
        <h1><?php the_title()?></h1>

        <?php if(have_posts()): while(have_posts()):the_post(); ?>

        <?php the_content();?>

        <!-- Select -->
        <h4>Select </h4>
        <?php if($colours): ?>
        <?php foreach($colours as $colour):?>
        <?php echo ($colour);?>
        <?php endforeach; ?>
        <?php endif;?>
        <?php  endwhile; endif;?>

        <br /> <br />
        <!-- Checkbox -->
        <h4>Checkbox</h4>
        <?php if($flavours):?>
        <?php  echo implode( ', ', $flavours);?>
        <?php  endif;?>

        <br />

        <!-- Radio Button -->
        <?php echo $consent; ?>

        <br />

        <!-- Button Group-->
        <?php echo $where; ?>
        <br>

        <!-- True or False -->
        <?php if($question): ?>
        Yes, I'm learning something
        <?php else:?>
        No, I'm not learning, don't waste my time!
        <?php endif;?>

    </div>
</section>

<br />

<?php get_footer();?>