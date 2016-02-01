<?php

/* ----------------------------------------------------------------------------------- */
/* Initializes all the theme settings option fields for pages area. */
/* ----------------------------------------------------------------------------------- */

$options = array(
    /* ----------------------------------------------------------------------------------- */
    /* Sidebar */
    /* ----------------------------------------------------------------------------------- */

    /* Single Page */
    array('name' => __('Single Page', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_side_media',
        'type' => 'metabox',
        'context' => 'side',
        'priority' => 'low' /* high/low */
    ),
    // Disable Page Comments
    array('name' => __('Disable Comments', 'tfuse'),
        'desc' => '',
        'id' => TF_THEME_PREFIX . '_disable_comments',
        'value' => tfuse_options('disable_page_comments','true'),
        'type' => 'checkbox',
        'divider' => true
    ),
    // Page Title
    array('name' => __('Page Title', 'tfuse'),
        'desc' => __('Select your preferred Page Title.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_page_title',
        'value' => 'default_title',
        'options' => array('hide_title' => __('Hide Page Title', 'tfuse'), 'default_title' => __('Default Title', 'tfuse'), 'custom_title' => __('Custom Title', 'tfuse')),
        'type' => 'select'
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
    array('name' => __('Header', 'tfuse'),
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
    ),
    // Select Slider
    $this->ext->slider->model->has_sliders() ?
            array(
        'name' => __('Slider', 'tfuse'),
        'desc' => __('Select a slider for your post. The sliders are created on the', 'tfuse') . '<a href="' . admin_url( 'admin.php?page=tf_slider_list' ) . '" target="_blank">' . __('Sliders page', 'tfuse') . '</a>.',
        'id' => TF_THEME_PREFIX . '_select_slider',
        'value' => '',
        'options' => $TFUSE->ext->slider->get_sliders_dropdown(),
        'type' => 'select'
            ) :
            array(
        'name' => __('Slider', 'tfuse'),
        'desc' => '',
        'id' => TF_THEME_PREFIX . '_select_slider',
        'value' => '',
        'html' => __('No sliders created yet. You can start creating one', 'tfuse') . '<a href="' . admin_url('admin.php?page=tf_slider_list') . '">' . __('here', 'tfuse') . '</a>.',
        'type' => 'raw'
            )
    ,
    // Header Image
    array('name' => __('Header Image', 'tfuse'),
        'desc' => __('Upload an image for your header. It will be resized to 960x142 px', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_header_image',
        'value' => '',
        'type' => 'upload',
    ),
    // Bottom Shortcodes
    array('name' => __('Shortcodes after Content', 'tfuse'),
        'desc' => __('In this textarea you can input your prefered custom shotcodes.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_content_bottom',
        'value' => '',
        'type' => 'textarea'
    )
);

/* * *********************************************************
  Advanced
 * ********************************************************** */
?>