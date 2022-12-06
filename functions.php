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