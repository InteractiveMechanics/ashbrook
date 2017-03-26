<?php 

// GENERAL SETUP
function printThemePath() {
   echo get_site_url() . '/wp-content/themes/' . get_template();
}

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'image', 'gallery', 'aside' ) );  



// CUSTOM POST TYPE STUFF
function create_custom_post_types() {
	 register_post_type( 'rahp_object',
        array(
            'labels' => array(
                'name' => __( 'RAHP Object' ),
                'singular_name' => __( 'RAHP Object' ),
                'add_new' => __( 'Add New Object' ),
                'add_new_item' => __( 'Add New Object' ),
                'edit_item' => __( 'Edit Object' ),
                'new_item' => __( 'New Object' ),
                'view_item' => __( 'View Object' ),
                'all_items' => __( 'All RAHP Objects' ),
                'not_found' => __( 'Object not found.' )

            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'rahp_objects' ),
        )
    );

     register_post_type( 'rahp_collection',
        array(
            'labels' => array(
                'name' => __( 'RAHP Collection' ),
                'singular_name' => __( 'RAHP Collection' ),
                'add_new' => __( 'Add New Collection' ),
                'add_new_item' => __( 'Add New Collection' ),
                'edit_item' => __( 'Edit Collection' ),
                'new_item' => __( 'New Collection' ),
                'view_item' => __( 'View Collection' ),
                'all_items' => __( 'All RAHP Collections' ),
                'not_found' => __( 'Collection not found.' )

            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'rahp_collections' ),
        )
    );

    register_post_type( 'rahp_subcategory',
        array(
            'labels' => array(
                'name' => __( 'RAHP Subcategory' ),
                'singular_name' => __( 'RAHP Subcategory' ),
                'add_new' => __( 'Add New Subcategory' ),
                'add_new_item' => __( 'Add New Subcategory' ),
                'edit_item' => __( 'Edit Subcategory' ),
                'new_item' => __( 'New Subcategory' ),
                'view_item' => __( 'View Subcategory' ),
                'all_items' => __( 'All RAHP Subcategory' ),
                'not_found' => __( 'Subcategory not found.' )

            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'rahp_subcategories' ),
        )
    ); 
    


     register_post_type( 'rahp_analysis',
        array(
            'labels' => array(
                'name' => __( 'RAHP Analysis' ),
                'singular_name' => __( 'RAHP Analysis' ),
                'add_new' => __( 'Add New Analysis' ),
                'add_new_item' => __( 'Add New Analysis' ),
                'edit_item' => __( 'Edit Analysis' ),
                'new_item' => __( 'New Analysis' ),
                'view_item' => __( 'View Analysis' ),
                'all_items' => __( 'All RAHP Analyses' ),
                'not_found' => __( 'Analysis not found.' )

            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'rahp_analyses' ),
        )
    );


}
add_action( 'init', 'create_custom_post_types' );

// ACF 

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
    
}


?>