<?php get_header(); ?>

<div id="primary" class="container">
    <main id="main" class="site-main" role="main">

        <section class="error-404 not-found">

            <head class="page-header">
                <h1 class="page-title">Sorry, page not found!</h1>
            </head>

            <div class="page-content">

                <h2>It looks like nothing was found at this location. Maybe try one of the links below or a search?</h2>

                <!-- Display the search form -->
                <?php get_search_form(); ?>

                <!-- Recent posts  -->
                <?php the_widget('WP_Widget_Recent_Posts'); ?>

                <div class="widget widget_categories">
                    <h3>Check the most used categories</h3>
                    <ul>
                        <!-- Categories  -->
                        <?php 
								wp_list_categories( array(
									'orderby' => 'count',
									'order' => 'DESC',
									'show_count' => 1,//means true
									'title_li' => '',
									'number' => 5, //5 categories
								) );
							?>
                    </ul>
                </div>
                <!-- Archives -->
                <?php the_widget('WP_Widget_Archives', 'dropdown=0', "after_title=</h2>"); ?>
                <!-- $archive_content -->

            </div>

        </section>

    </main>
</div>

<?php get_footer(); ?>