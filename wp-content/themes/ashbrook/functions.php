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
            'taxonomies'  => array( 'category', 'post_tag'),
            'supports' => array( 'title', 'editor', 'comments', 'author', 'custom-fields', 'thumbnail', 'post-thumbnails', 'custom-fields', 'post-templates'),
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
            'taxonomies'  => array( 'category', 'post_tag'),
            'supports' => array( 'title', 'editor', 'comments', 'author', 'custom-fields', 'thumbnail', 'custom-fields', 'post-templates'),
            'rewrite' => array( 'slug' => 'rahp_collections' ),
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
            'taxonomies'  => array( 'category', 'post_tag' ),
            'supports' => array( 'title', 'editor', 'comments', 'author', 'custom-fields', 'thumbnail', 'custom-fields', 'post-templates'),
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



// SUB CATEGORY AND GRANDCHILD CATEGORY TEMPLATES

/**
 *  Load different template for sub category
 *  tweaked a bit to check child vs grandchild
 *  http://burnignorance.com/php-programming-tips/how-to-use-different-template-for-sub-categories-in-wordpress/ 
 */
function sub_category_template() { 
    
    // Get the category id from global query variables
    $cat = get_query_var('cat');

    function has_term_have_children( $term_id = '', $taxonomy = 'category' )
    {
        // Check if we have a term value, if not, return false
        if ( !$term_id ) 
            return false;

        // Get term children
        $term_children = get_term_children( filter_var( $term_id, FILTER_VALIDATE_INT ), filter_var( $taxonomy, FILTER_SANITIZE_STRING ) );

        // Return false if we have an empty array or WP_Error object
        if ( empty( $term_children ) || is_wp_error( $term_children ) )
        return false;

        return true;
    }

    if(!empty($cat)) {    
        
        // Get the detailed category object
        $category = get_category($cat);

        // Check if it is sub-category and having a parent and a child, also check if the template file exists
        if( ($category->parent != '0') && ( has_term_have_children($cat) )&& (file_exists(TEMPLATEPATH . '/sub-category.php')) ) { 
            
            // Include the template for sub-catgeory
            include(TEMPLATEPATH . '/sub-category.php');
            
        }

        if( ($category->parent != '0') && (!has_term_have_children($cat) ) && (file_exists(TEMPLATEPATH . '/grandchild-category.php')) ) { 
            
            // Include the template for grandchild-catgeory
            include(TEMPLATEPATH . '/grandchild-category.php');
            exit;
        }


        

        return;
    }
    return;

}
add_action('template_redirect', 'sub_category_template');

// REMOVES ELLIPSES FROM EXCERPT
function trim_excerpt($text) {
    return rtrim($text,'[&hellip;]');
}
add_filter('get_the_excerpt', 'trim_excerpt');








?>