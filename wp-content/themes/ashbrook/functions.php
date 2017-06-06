<?php 

// GENERAL SETUP
function printThemePath() {
   echo get_site_url() . '/wp-content/themes/' . get_template();
}


add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'image', 'gallery', 'aside' ) );  


// TRYING MENU SHIT AGAIN KILL ME NOW

require_once('wp-bootstrap-navwalker.php');

register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'Ashbrook_RAHP' ),
        'secondary' => __('Secondary Menu', 'Ashbrook_RAHP')
) );



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
            'show_in_rest' => true,
            'taxonomies'  => array( 'category', 'post_tag'),
            'supports' => array( 'title', 'editor', 'comments', 'author', 'custom-fields', 'thumbnail', 'post-thumbnails', 'custom-fields', 'post-templates', 'revisions'),
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
            'supports' => array( 'title', 'editor', 'comments', 'author', 'custom-fields', 'thumbnail', 'custom-fields', 'post-templates', 'revisions'),
            'rewrite' => array( 'slug' => 'rahp_collections' ),
        )
    );

     register_post_type( 'rahp_art',
        array(
            'labels' => array(
                'name' => __( 'RAHP Art' ),
                'singular_name' => __( 'RAHP Art' ),
                'add_new' => __( 'Add New Art' ),
                'add_new_item' => __( 'Add New Art' ),
                'edit_item' => __( 'Edit Art' ),
                'new_item' => __( 'New Art' ),
                'view_item' => __( 'View Art' ),
                'all_items' => __( 'All RAHP Art' ),
                'not_found' => __( 'Art not found.' )

            ),
            'public' => true,
            'has_archive' => true,
            'taxonomies'  => array( 'category', 'post_tag' ),
            'supports' => array( 'title', 'editor', 'comments', 'author', 'custom-fields', 'thumbnail', 'custom-fields', 'post-templates', 'revisions'),
            'rewrite' => array( 'slug' => 'rahp_art' ),
        )
    );

     register_post_type( 'totm',
        array(
            'labels' => array(
                'name' => __( 'Theme of the Month' ),
                'singular_name' => __( 'Theme of the Month' ),
                'add_new' => __( 'Add New TOTM' ),
                'add_new_item' => __( 'Add New TOTM' ),
                'edit_item' => __( 'Edit TOTM' ),
                'new_item' => __( 'New TOTM' ),
                'view_item' => __( 'View TOTM' ),
                'all_items' => __( 'All Themes of the Month' ),
                'not_found' => __( 'Theme of the Month not found.' )

            ),
            'public' => true,
            'has_archive' => true,
            'taxonomies'  => array( 'category', 'post_tag'),
            'supports' => array( 'title', 'editor', 'comments', 'author', 'custom-fields', 'thumbnail', 'custom-fields', 'post-templates', 'revisions'),
            'rewrite' => array( 'slug' => 'totm' ),
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
        'page_title' => 'Theme of the Month Archive Settings',
        'menu_title' => 'Theme of the Month Archive',
        'parent_slug' => 'theme-general-settings',
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
            exit;
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
        //$post_type = get_post_type_object(get_post_type());
        //$slug = $post_type->rewrite;
        //echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, '</h5></li><li><h5>' . $delimiter . ' ');
        if ($showCurrent == 0) ;
        echo  '<li><h5>' . $cats . '</li></h5>';
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

  // ADD CPT TO SEARCH

  add_filter( 'pre_get_posts', 'tgm_io_cpt_search' );
  /**
   * This function modifies the main WordPress query to include an array of 
   * post types instead of the default 'post' post type.
   *
   * @param object $query  The original query.
   * @return object $query The amended query.
   */
  function tgm_io_cpt_search( $query ) {
  
    if ( $query->is_search  && $query->is_main_query() && $query->get( 's' ) ) {
      $query->set( 
        'post_type', array('page', 'post', 'rahp_object', 'rahp_art', 'rahp_collection', 'totm' )
      );

       return $query;

    }
    
  }

    // ADDDING ACF FIELDS TO SEARCH

    /**
    * [list_searcheable_acf list all the custom fields we want to include in our search query]
    * @return [array] [list of custom fields]
    */
    function list_searcheable_acf(){
      $list_searcheable_acf = array("body", "introduction", "artist", "artwork_title", "artwork_year", "subtitle", "object_date", "footnotes", "citation", "compare");
      return $list_searcheable_acf;
    }
    /**
     * [advanced_custom_search search that encompasses ACF/advanced custom fields and taxonomies and split expression before request]
     * @param  [query-part/string]      $where    [the initial "where" part of the search query]
     * @param  [object]                 $wp_query []
     * @return [query-part/string]      $where    [the "where" part of the search query as we customized]
     * see https://vzurczak.wordpress.com/2013/06/15/extend-the-default-wordpress-search/
     * credits to Vincent Zurczak for the base query structure/spliting tags section
     */
  function advanced_custom_search( $where, &$wp_query ) {
      global $wpdb;

      if ( empty( $where ))
          return $where;

      // get search expression
      $terms = $wp_query->query_vars[ 's' ];

      // explode search expression to get search terms
      $exploded = explode( ' ', $terms );
      if( $exploded === FALSE || count( $exploded ) == 0 )
          $exploded = array( 0 => $terms );

      // reset search in order to rebuilt it as we whish
      $where = '';

      // get searcheable_acf, a list of advanced custom fields you want to search content in
      $list_searcheable_acf = list_searcheable_acf();
      foreach( $exploded as $tag ) :
          $where .= " 
            AND (
              (wp_posts.post_title LIKE '%$tag%')
              OR (wp_posts.post_content LIKE '%$tag%')
              OR EXISTS (
                SELECT * FROM wp_postmeta
                    WHERE post_id = wp_posts.ID
                      AND (";
          foreach ($list_searcheable_acf as $searcheable_acf) :
            if ($searcheable_acf == $list_searcheable_acf[0]):
              $where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
            else :
              $where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
            endif;
          endforeach;
              $where .= ")
              )
              OR EXISTS (
                SELECT * FROM wp_comments
                WHERE comment_post_ID = wp_posts.ID
                  AND comment_content LIKE '%$tag%'
              )
              OR EXISTS (
                SELECT * FROM wp_terms
                INNER JOIN wp_term_taxonomy
                  ON wp_term_taxonomy.term_id = wp_terms.term_id
                INNER JOIN wp_term_relationships
                  ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
                WHERE (
                  taxonomy = 'post_tag'
                      OR taxonomy = 'category'                
                      OR taxonomy = 'myCustomTax'
                  )
                  AND object_id = wp_posts.ID
                  AND wp_terms.name LIKE '%$tag%'
              )
          )";
      endforeach;
      return $where;
  }

  add_filter( 'posts_search', 'advanced_custom_search', 500, 2 );









    // PAGINATION CLASSES

  add_filter('next_post_link', 'next_posts_link_attributes');
  add_filter('previous_post_link', 'prev_posts_link_attributes');

  function next_posts_link_attributes($output) {
     $code = 'class="next"';
     return str_replace('<a href=', '<a '.$code.' href=', $output);
  }

   function prev_posts_link_attributes($output) {
    $code = 'class="prev"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
  }


  // ADD DEFAULT IMAGE IN ACF
  
  add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field', 20);
  function add_default_value_to_image_field($field) {
    acf_render_field_setting( $field, array(
      'label'     => __('Default Image','acf'),
      'instructions'  => __('Appears when creating a new post','acf'),
      'type'      => 'image',
      'name'      => 'default_value',
    ));
}

  // TRYING TO ADD WORD COUNT TO WSYIWYG

  add_filter('acf/validate_value/name=introduction', 'my_acf_validate_value', 10, 4);
  add_filter('acf/validate_value/name=category_introduction', 'my_acf_validate_value', 10, 4);


    function my_acf_validate_value( $valid, $value, $field, $input ){
    
    // bail early if value is already invalid
    if( !$valid ) {
        
        return $valid;
        
    }
    
    if( strlen($value) > 567 ) {
        
        $valid = 'You have exceed the maximum character count of 567 (around 94 words)';
        
    }
    
    // return
    return $valid;
    }


    
    function my_local_script() {
      wp_enqueue_script( 'ashbrook_local_script',  get_template_directory_uri() . '/js/map.js'); 
      //after wp_enqueue_script
      wp_localize_script( 'ashbrook_local_script', 'script_var', array( 'templateUrl' => get_template_directory_uri() ));
    }

    add_action('wp_enqueue_scripts', 'my_local_script');



    





?>