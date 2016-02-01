<?php
/**
 * Create custom posts types
 *
 * @since Medica 2.0
 */

if ( !function_exists('tfuse_create_custom_post_types') ) :
/**
 * Retrieve the requested data of the author of the current post.
 *  
 * @param array $fields first_name,last_name,email,url,aim,yim,jabber,facebook,twitter etc.
 * @return null|array The author's spefified fields from the current author's DB object.
 */
    function tfuse_create_custom_post_types()
    {
		//Reservation_form
		        $labels = array(
                        'name' => __('Reservation', 'tfuse'),
                        'singular_name' => __('Reservation', 'tfuse'),
                        'add_new' => __('Add New', 'tfuse'),
                        'add_new_item' => __('Add New Reservation', 'tfuse'),
                        'edit_item' => __('Edit Reservation info', 'tfuse'),
                        'new_item' => __('New Reservation', 'tfuse'),
                        'all_items' => __('All Reservations', 'tfuse'),
                        'view_item' => __('View Reservation info', 'tfuse'),
                        'parent_item_colon' => ''
                );
                $reservationform_rewrite=apply_filters('tfuse_reservationform_rewrite','reservationform_list');
                $res_args = array(
                                'labels' => $labels,
                                'public' => true,
                                'publicly_queryable' => false,
                                'show_ui' => false,
                                'query_var' => true,
                                'exclude_from_search'=>true,
                                'has_archive' => true,
                                'rewrite' => array('slug'=> $reservationform_rewrite),
                                'menu_position' => 6,
                                'supports' => array(null)
                        );
               register_taxonomy('reservations', array('reservations'), array(
                            'hierarchical' => true,
                            'labels' => array(
                                'name' => __('Reservation Forms', 'tfuse'),
                                'singular_name' => __('Reservation Form', 'tfuse'),
                                'add_new_item' => __('Add New Reservation Form', 'tfuse'),
                            ),
                            'show_ui' => false,
                            'query_var' => true,
                            'rewrite' => array('slug' => $reservationform_rewrite)
                        ));
                        register_post_type( 'reservations' , $res_args );


        // DOCTORS
        $labels = array(
                'name' => __('Doctors', 'tfuse'),
                'singular_name' => __('Doctor', 'tfuse'),
                'add_new' => __('Add New', 'tfuse'),
                'add_new_item' => __('Add New Doctor', 'tfuse'),
                'edit_item' => __('Edit Doctor info', 'tfuse'),
                'new_item' => __('New Doctor', 'tfuse'),
                'all_items' => __('All Doctors', 'tfuse'),
                'view_item' => __('View Doctor info', 'tfuse'),
                'search_items' => __('Search Doctors', 'tfuse'),
                'not_found' =>  __('Nothing found', 'tfuse'),
                'not_found_in_trash' => __('Nothing found in Trash', 'tfuse'),
                'parent_item_colon' => ''
        );

        $doctorslist_rewrite = apply_filters('tfuse_doctorslist_rewrite','all-doctors-list');
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                //'menu_icon' => get_template_directory_uri() . '/images/icons/doctors.png',
                'has_archive' => true,
                'rewrite' => array('slug'=> $doctorslist_rewrite),               
                'menu_position' => 5,
                'supports' => array('title','editor','excerpt','comments')
        );
        //end
        // Add new taxonomy, make it hierarchical (like categories)
        $labels = array(
            'name' => __('Specialties', 'tfuse'),
            'singular_name' => __('Specialty', 'tfuse'),
            'search_items' => __('Search Specialties','tfuse'),
            'all_items' => __('All Specialties','tfuse'),
            'parent_item' => __('Parent Specialty','tfuse'),
            'parent_item_colon' => __('Parent Specialty:','tfuse'),
            'edit_item' => __('Edit Specialty','tfuse'),
            'update_item' => __('Update Specialty','tfuse'),
            'add_new_item' => __('Add New Specialty','tfuse'),
            'new_item_name' => __('New Specialty Name','tfuse')
        );
        $doctorslist_taxonomy_rewrite = apply_filters('tfuse_doctorslist_taxonomy_rewrite','specialties-list');
        register_taxonomy('specialties', array('doctors'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => $doctorslist_taxonomy_rewrite)
        ));
        register_post_type( 'doctors' , $args );

        // SERVICES
        $labels = array(
                'name' => __('Services', 'tfuse'),
                'singular_name' => __('Service', 'tfuse'),
                'add_new' => __('Add New', 'tfuse'),
                'add_new_item' => __('Add New Service', 'tfuse'),
                'edit_item' => __('Edit Service', 'tfuse'),
                'new_item' => __('New Service', 'tfuse'),
                'all_items' => __('All Services', 'tfuse'),
                'view_item' => __('View Service', 'tfuse'),
                'search_items' => __('Search Service', 'tfuse'),
                'not_found' =>  __('Nothing found', 'tfuse'),
                'not_found_in_trash' => __('Nothing found in Trash', 'tfuse'),
                'parent_item_colon' => ''
        );

        $serviceslist_rewrite = apply_filters('tfuse_serviceslist_rewrite','services-list');
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                //'menu_icon' => get_template_directory_uri() . '/images/icons/medical_services.png',
                'rewrite' => array('slug'=> $serviceslist_rewrite),
                'menu_position' => 5,
                'supports' => array('title','editor','excerpt','comments')
        );

        register_post_type( 'services' , $args );

        // TESTIMONIALS
        $labels = array(
                'name' => __('Testimonials', 'tfuse'),
                'singular_name' => __('Testimonial', 'tfuse'),
                'add_new' => __('Add New', 'tfuse'),
                'add_new_item' => __('Add New Testimonial', 'tfuse'),
                'edit_item' => __('Edit Testimonial', 'tfuse'),
                'new_item' => __('New Testimonial', 'tfuse'),
                'all_items' => __('All Testimonials', 'tfuse'),
                'view_item' => __('View Testimonial', 'tfuse'),
                'search_items' => __('Search Testimonials', 'tfuse'),
                'not_found' =>  __('Nothing found', 'tfuse'),
                'not_found_in_trash' => __('Nothing found in Trash', 'tfuse'),
                'parent_item_colon' => ''
        );

        $args = array(
                'labels' => $labels,
                'public' => false,
                'publicly_queryable' => false,
                'show_ui' => true,
                'query_var' => true,
                //'menu_icon' => get_template_directory_uri() . '/images/icons/testimonials.png',
                'rewrite' => true,
                'menu_position' => 5,
                'supports' => array('title','editor')
        ); 

        register_post_type( 'testimonials' , $args );

    }
    tfuse_create_custom_post_types();

endif;

add_action('category_add_form', 'taxonomy_redirect_note');
add_action('specialties_add_form', 'taxonomy_redirect_note');
function taxonomy_redirect_note($taxonomy){
    echo '<p><strong>Note:</strong> More options are available after you add the '.$taxonomy.'. <br />
        Click on the Edit button under the '.$taxonomy.' name.</p>';
}
