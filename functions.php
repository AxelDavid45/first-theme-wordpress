<?php

// Functions for add supports to wordpress theme
function init_theme()
{
    // Support for thumbnails
    add_theme_support('post-thumbnails');
    //Support for title tag in head tag
    add_theme_support('title-tag');
    //Adding a menu
    register_nav_menus(array(
        'top_menu' => 'Menú Principal'
    ));

}

// Add the function to a hook
add_action('after_setup_theme', 'init_theme');

// Function for add a widget in the footer
function sidebar()
{
    register_sidebar(array(
        'name' => 'Pie de página',
        'id' => 'footer',
        'description' => 'Zona de widgets para pie de página',
        'before_title' => '<p>',
        'after_title' => '</p>',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>'
    ));
}

//Registering the function in widgets
add_action('widgets_init', 'sidebar');

// Load assets that the project needs
function assets()
{
    // Adding bootstrap
    wp_register_style(
        'bootstrap',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css',
        '',
        '4.4.1',
        'all'
    );
    // Adding Montserrat font
    wp_register_style(
        'montserrat',
        'https://fonts.googleapis.com/css?family=Montserrat&display=swap',
        '',
        '1.1',
        'all'
    );

    // Adding dependencies to style.css
    wp_enqueue_style(
        'styles',
        get_stylesheet_uri(),
        array(
            'bootstrap',
            'montserrat'
        ),
        '1.0',
        'all'
    );

    //Adding popper library from bootstrap
    wp_register_script(
        'popper',
        'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
        '',
        '1.16.0',
        true
    );
    //Adding fontawesome
    wp_register_script(
        'fontawesome',
        'https://kit.fontawesome.com/4bc87b4ae7.js',
        '',
        '1.0',
        true
    );

    // Adding to queue popper and jquery
    wp_enqueue_script(
        'bootstrap',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
        array(
            'jquery',
            'popper',
            'fontawesome'
        ),
        '4.4.1',
        true
    );

    // Adding a custom javascript file
    $customJsUrl = get_template_directory_uri() . '/assets/js/custom.js';
    wp_enqueue_script(
        'custom',
        $customJsUrl,
        '',
        '1.0',
        true
    );
}

// Loading the function before show the page
add_action('wp_enqueue_scripts', 'assets');

// Function to create a custom type post
function productos_type() {
    // Labels array with custom settings
    $labels = array(
        'name' => 'Productos',
        'single_name' => 'Producto',
        'menu_name' => 'Productos'
    );
    $supports = array(
        'title',
        'editor',
        'thumbnail',
        'revisions'
    );

    //Arguments with custom settings
    $args = array(
        'label' => 'Productos',
        'description' => 'Productos de platzi',
        'labels' => $labels,
        'supports' => $supports,
        'public' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'can_export' => true,
        'publicly_queryable' => true,
        'rewrite' => true,
        'show_in_rest' => true
    );

    //Adding the custom type
    register_post_type('producto', $args);

}
//Adding function productos_type to hook init
add_action('init', 'productos_type');