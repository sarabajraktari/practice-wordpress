<?php
    function awesome_script_enqueue(){
        // css
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
         wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.0','all');
        //  js
         wp_enqueue_script('jquery');
         wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
         wp_enqueue_script('customjs', get_template_directory_uri(). '/js/awesome.js', array(), '1.0.0', true);
        }

    add_action('wp_enqueue_scripts','awesome_script_enqueue');

    function awesome_theme_setup(){
        add_theme_support('menus');
        register_nav_menu('primary','Primary Header Navigation');
        register_nav_menu('secondary','Footer Navigation');

    }
    add_action('init','awesome_theme_setup');

    // to add background image on website
    add_theme_support('custom-background');

    // to add header image
    add_theme_support('custom-header');

    //to add blog image
    add_theme_support('post-thumbnails');

    //to add some formats on posts
    add_theme_support('post-formats',array('aside','image','video'));

    // to add html5 formating
    add_theme_support('html5',array('search-form'));

    // Sidebar function

    function awesome_widget_setup(){
        if(function_exists('register_sidebar')){

            register_sidebar(
                array(
                'name'=>'Sidebar',
                'id'=>'sidebar-1',
                'class'=>'sidebar-custom',
                'description'=>'Standart Sidebar',
                'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
                'after_widget'=>'</aside>',
                'before_title'=>'<h1 class="widget-title"',
                'after_title'=>'</h1>'
            ));
        register_sidebar(
            array(
                'name'=>'Sidebar-2',
                'id'=>'sidebar-2',
                'class'=>'sidebar-custom-2',
                'description'=>'About Sidebar',
                'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
                'after_widget'=>'</aside>',
                'before_title'=>'<h1 class="widget-title"',
                'after_title'=>'</h1>'
                )
            );
        }
    }

    add_action('widgets_init','awesome_widget_setup');


    // Include Walker file
    require get_template_directory() . '/inc/walker.php';

    // Head function to remove version wordpress
    function awesome_remove_version(){
        return '';
    };

    add_filter('the_generator','awesome_remove_version');

        // Custom Post Field

    function awesome_custom_post_type(){
        
        $labels=array(
            'name'=>'Portfolio', //name post Field
            'singular_name'=>'Portfolio',
            'add_new'=>'Add Item',  //to create new item
            'all_items'=>'All Items',   //to show all items
            'add_new_item'=>'Add Item' ,
            'edit_item'=>'Edit Item', //to edit item
            'new_item'=>'New Item',
            'view_item'=>'View Item',
            'search_item'=>'Search Portfolio',
            'not_found'=>'No items found',
            'not_found_in_trash' =>'No items found in trash',
            'parent_item_colon'=>'Parent Item'

        );

        $args=array(
            'labels'=>$labels,
            'public'=>true,
            'has_archive'=>true,
            'publicly_queryable'=>true,
            'query_var'=>true,
            'rewrite'=>true,
            'capability_field'=>'post',
            'hierarchical'=>false,
            'supports'=>array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'revisions'
            ),
            // 'taxonomies'=>array('category','post_tag'), We have taxonomy from post Field
            'menu_position'=>5,
            'exclude_from_search'=>false
        );

        register_post_type('portfolio',$args);

    }
    add_action('init','awesome_custom_post_type');


    function awesome_custom_taxonomies(){
        
        //add new taxonomy hierarchical

        $labels=array(
            'name' => 'Fields',
            'singular_name' => 'Field',
            'search_items' => 'Search Fields',
            'all_items' => 'All Fields',
            'parent_item' => 'Parent Field',
            'parent_item_colon' => 'Parent Field:',
            'edit_item' => 'Edit Field',
            'update_item' => 'Update Field',
            'add_new_item' => 'Add New Work Field',
            'new_item_name' => 'New Field Name',
            'menu_name' => 'Fields'
                );
        $args=array(
            'hierarchical' => true,
            'labels'=>$labels,
            'show_ui'=>true,
            'show_admin_column'=>true, //to show colums for taxonomies
            'query_var'=>true,
            'rewrite'=>array('slug'=>'field')
        );

        register_taxonomy('field',array('portfolio'),$args);//name taxonomy, which post Field is activate,and args
        
        //add new taxonomy NOT hierarchical
        register_taxonomy('software','portfolio',array(
            'label'=>'Software',
            'rewrite'=>array('slug'=>'software'),
            'hierarchical'=>false,
            'show_admin_column'=>true
        ));
    }

    add_action('init','awesome_custom_taxonomies');


    // Custom Term Function


    function awesome_get_terms( $postID, $term ){
	
        $terms_list = wp_get_post_terms($postID, $term); 
        $output = '';
                        
        $i = 0;
        foreach( $terms_list as $term ){ $i++;
            if( $i > 1 ){ $output .= ', '; }
            $output .= '<a href="' . get_term_link( $term ) . '">'. $term->name .'</a>';
        }
        
        return $output;
        
    }

    //Image Sizes
    add_image_size('image',600,600,false);
    add_image_size('my_custom_size',700,400,true);