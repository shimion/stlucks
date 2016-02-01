<?php

/* ----------------------------------------------------------------------------------- */
/* Initializes all the theme settings option fields for categories area.             */
/* ----------------------------------------------------------------------------------- */

$options = array(
    // Element of Hedear
    array('name' => __('Element of Hedear', 'tfuse'),
        'desc' => __('Select type of element on the header.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_header_element',
        'value' => 'image',
        'options' => array('none' => __('Without Header Element', 'tfuse'), 'slider' => __('Slider on Header', 'tfuse'), 'image' => __('Image on Header', 'tfuse')),
        'type' => 'select'
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
    // Image on Header
    array('name' => __('Header Image', 'tfuse'),
        'desc' => __('Upload an image for your header. It will be resized to 960x142 px', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_header_image',
        'value' => tfuse_options('category_header_image'),
        'type' => 'upload'
    )
);

?>