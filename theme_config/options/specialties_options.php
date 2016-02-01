<?php

/* ----------------------------------------------------------------------------------- */
/* Initializes all the theme settings option fields for specialities categories area. */
/* ----------------------------------------------------------------------------------- */

$options = array(
    /* ----------------------------------------------------------------------------------- */
    /* Sidebar */
    /* ----------------------------------------------------------------------------------- */

    // Page Title
    array('name' => __('Page Title', 'tfuse'),
        'desc' => __('Select your preferred Page Title.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_page_title',
        'value' => 'default_title',
        'options' => array('hide_title' => 'Hide Title', 'default_title' => 'Default Specialty Title', 'custom_title' => __('Custom Title', 'tfuse')),
        'type' => 'select',
        'divider' => true
    ),
    // Custom Title
    array('name' => __('Custom Title', 'tfuse'),
        'desc' => __('Enter your custom title for this page.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_custom_title',
        'value' => '',
        'type' => 'text'
    ),
    
    /* ----------------------------------------------------------------------------------- */
    /* After Textarea */
    /* ----------------------------------------------------------------------------------- */

    /* Header Options */
    array('name' => __('Header Options', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_header_option',
        'type' => 'metabox',
        'context' => 'normal'
    ),
    // Element of Hedear
    array('name' => __('Element of Hedear', 'tfuse'),
        'desc' => __('Select type of element on the header.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_header_element',
        'value' => 'image',
        'options' => array('none' => __('Without Header Element', 'tfuse'), 'slider' => __('Slider on Header', 'tfuse'), 'image' => __('Image on Header', 'tfuse')),
        'type' => 'select',
        'divider' => true
    ),
    // Select Slider
    $this->ext->slider->model->has_sliders() ?
            array(
        'name' => __('Slider', 'tfuse'),
        'desc' => __('Select a slider for your post. The sliders are created on the <a href="', 'tfuse') . admin_url( 'admin.php?page=tf_slider_list' ) . '" target="_blanck">Sliders page</a>.',
        'id' => TF_THEME_PREFIX . '_select_slider',
        'value' => '',
        'options' => $TFUSE->ext->slider->get_sliders_dropdown(),
        'type' => 'select',
        'divider' => true
            ) :
            array(
        'name' => __('Slider', 'tfuse'),
        'desc' => '',
        'id' => TF_THEME_PREFIX . '_select_slider',
        'value' => '',
        'html' => __('No sliders created yet. You can start creating one', 'tfuse') . '<a href="' . admin_url('admin.php?page=tf_slider_list') . '">' . __('here', 'tfuse') . '</a>.',
        'type' => 'raw',
        'divider' => TRUE
            )
    ,
    // Header Image
    array('name' => __('Header Image', 'tfuse'),
        'desc' => __('Upload an image for your header. It will be resized to 960x142 px', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_header_image',
        'value' => tfuse_options('specialty_header_image'),
        'type' => 'upload',
        'divider' => true
    ),
    // Top Shortcodes
    array('name' => __('Shortcodes Before Content', 'tfuse'),
        'desc' => __('In this textarea you can input your prefered custom shotcodes.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_content_top',
        'value' => '',
        'type' => 'textarea'
    ),
    // Bottom Shortcodes
    array('name' => __('Shortcodes after Content', 'tfuse'),
        'desc' => __('In this textarea you can input your prefered custom shotcodes.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_content_bottom',
        'value' => '',
        'type' => 'textarea'
    )
);

?>