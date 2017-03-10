<?php 

function printThemePath() {
   echo get_site_url() . '/wp-content/themes/' . get_template();
}

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'image', 'gallery', 'aside' ) );  


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

}
add_action( 'init', 'create_custom_post_types' );



?>