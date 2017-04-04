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



function custom_breadcrumbs() {
 
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = ''; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 0; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<h5><span class="current">'; // tag before the current crumb
    $after = '</span></h5>'; // tag after the current crumb
 
    global $post;
    $homeLink = get_bloginfo('url');
 
    if (is_home() || is_front_page()) {
 
        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
    } else {
 
         echo '<ul class="breadcrumb">';
 
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo  '<li><h5>' . get_category_parents($thisCat->parent, TRUE, '</h5></li><li><h5>' . $delimiter . '') . '</h5></li>' ;
      echo $before . ' ' . single_cat_title('', false) . ' ' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        // $post_type = get_post_type_object(get_post_type());
        // $slug = $post_type->rewrite;
        // echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, '</h5></li><li><h5>' . $delimiter . ' ');
        if ($showCurrent == 0) ;
        echo  '<li><h5>' . $cats . '';
        //echo  '<li><h5>' . esc_html($cat->name) . '</h5></li>';
        
        if ($showCurrent == 1) echo $before . esc_html($cat->name) . $after;
 
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);

        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 0) echo $before . get_the_title() . $after;
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</h5></li></ul>';
 
} // end qt_custom_breadcrumbs()

  }




?>