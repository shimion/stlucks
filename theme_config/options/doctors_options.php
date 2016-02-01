<?php

/* ----------------------------------------------------------------------------------- */
/* Initializes all the theme settings option fields for posts area. */
/* ----------------------------------------------------------------------------------- */

$options = array(
    /* ----------------------------------------------------------------------------------- */
    /* Sidebar */
    /* ----------------------------------------------------------------------------------- */

    /* Single Post */
    array('name' => __('Info Page Options', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_side_media',
        'type' => 'metabox',
        'context' => 'side',
        'priority' => 'low' /* high/low */
    ),
    // Disable Single Post Image
    array('name' => __('Disable Image', 'tfuse'),
        'desc' => '',
        'id' => TF_THEME_PREFIX . '_disable_image',
        'value' => tfuse_options('disable_image','false'),
        'type' => 'checkbox'
    ),
    // Disable Single Post Video
    array('name' => __('Disable Video', 'tfuse'),
        'desc' => '',
        'id' => TF_THEME_PREFIX . '_disable_video',
        'value' => tfuse_options('disable_video','false'),
        'type' => 'checkbox'
    ),
    // Disable Single Post Comments
    array('name' => __('Disable Comments', 'tfuse'),
        'desc' => '',
        'id' => TF_THEME_PREFIX . '_disable_comments',
        'value' => tfuse_options('disable_posts_comments','false'),
        'type' => 'checkbox'
    ),
    /* ----------------------------------------------------------------------------------- */
    /* After Textarea */
    /* ----------------------------------------------------------------------------------- */


    /* Post Media */
    array('name' => __('Media', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_media',
        'type' => 'metabox',
        'context' => 'normal'
    ),
    // Single Image
    array('name' => __('Image', 'tfuse'),
        'desc' => __('This is the main image that appears on doctors\' info page. Upload one from your computer, or specify an online address for your image (Ex: ttp://yoursite.com/image.png).', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_single_image',
        'value' => '',
        'type' => 'upload',
        'hidden_children' => array(
            TF_THEME_PREFIX . '_single_img_dimensions',
            TF_THEME_PREFIX . '_single_img_position'
        )
    ),
    // Single Image Dimensions
    array('name' => __('Image Resize (px)', 'tfuse'),
        'desc' => __('These are the default width and height values. If you want to resize the image change the values with your own. If you input only one, the image will get resized with constrained proportions based on the one you specified.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_single_img_dimensions',
        'value' => tfuse_options('single_image_dimensions'),
        'type' => 'textarray'
    ),
    // Single Image Position
    array('name' => __('Image Position', 'tfuse'),
        'desc' => __('Select your preferred image alignment', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_single_img_position',
        'value' => tfuse_options('thumbnail_position'),
        'options' => array(
            '' => array($url . 'full_width.png', __('Don\'t apply an alignment', 'tfuse')),
            'alignleft' => array($url . 'left_off.png', __('Align  to the left', 'tfuse')),
            'alignright' => array($url . 'right_off.png', __('Align to the right', 'tfuse'))
            ),
        'type' => 'images',
        'divider' => true
    ),
    // Thumbnail Image
    array('name' => __('Doctor Photo', 'tfuse'),
        'desc' => __('This is the main image of a doctor. Upload one from your computer, or specify an online address for your image (Ex: ttp://yoursite.com/image.png).', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_thumbnail_image',
        'value' => '',
        'type' => 'upload',
        'hidden_children' => array(
            TF_THEME_PREFIX . '_thumbnail_dimensions',
            TF_THEME_PREFIX . '_thumbnail_position'
        )
    ),
    // Posts Thumbnail Dimensions
    array('name' => __('Photo Resize (px)', 'tfuse'),
        'desc' => __('These are the default width and height values. If you want to resize the photo change the values with your own. If you input only one, the photo will get resized with constrained proportions based on the one you specified.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_thumbnail_dimensions',
        'value' => tfuse_options('thumbnail_dimensions'),
        'type' => 'textarray'
    ),
    // Thumbnail Position
    array('name' => __('Photo Position', 'tfuse'),
        'desc' => __('Select your preferred doctor photo Position.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_thumbnail_position',
        'value' => tfuse_options('thumbnail_position'),
        'options' => array(
            '' => array($url . 'full_width.png', __('Don\'t apply an alignment', 'tfuse')),
            'alignleft' => array($url . 'left_off.png', __('Align to the left', 'tfuse')),
            'alignright' => array($url . 'right_off.png', __('Align to the right', 'tfuse'))
            ),
        'type' => 'images',
        'divider' => true
    ),
    // Custom Post Video
    array('name' => __('Video', 'tfuse'),
          'desc' => __('Copy paste the video URL or embed code. The video URL works only for Vimeo and YouTube videos. Read <a target="_blank" href="http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/">prettyPhoto documentation</a>
                      for more info on how to add video or flash in this text area
                      ', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_video_link',
        'value' => '',
        'type' => 'textarea',
        'hidden_children' => array(
            TF_THEME_PREFIX . '_video_dimensions',
            TF_THEME_PREFIX . '_video_position'
        )
    ),
    // Video Dimensions
    array('name' => __('Video Size (px)', 'tfuse'),
          'desc' => __('These are the default width and height values. If you want to resize the video change the values with your own. If you input only one, the video will get resized with constrained proportions based on the one you specified.', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_video_dimensions',
        'value' => tfuse_options('thumbnail_dimensions'),
        'type' => 'textarray'
    ),
    // Video Position
    array('name' => __('Video Position', 'tfuse'),
        'desc' => __('Select your preferred video alignment', 'tfuse'),
        'id' => TF_THEME_PREFIX . '_video_position',
        'value' => tfuse_options('thumbnail_position'),
        'options' => array(
            '' => array($url . 'full_width.png', __('Don\'t apply an alignment', 'tfuse')),
            'alignleft' => array($url . 'left_off.png', __('Align to the left', 'tfuse')),
            'alignright' => array($url . 'right_off.png', __('Align to the right', 'tfuse'))
            ),
        'type' => 'images'
    ),
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
        'type' => 'select'
    ),
    // Select Slider
    $this->ext->slider->model->has_sliders() ?
            array(
        'name' => __('Slider', 'tfuse'),
        'desc' => __('Select a slider for your post. The sliders are created on the <a href="', 'tfuse') . admin_url( 'admin.php?page=tf_slider_list' ) . '" target="_blanck">Sliders page</a>.',
        'id' => TF_THEME_PREFIX . '_select_slider',
        'value' => '',
        'options' => $TFUSE->ext->slider->get_sliders_dropdown(),
        'type' => 'select'
            ) :
            array(
        'name' => __('Slider', 'tfuse'),
        'desc' => __('More details on <a href="', 'tfuse') . admin_url('admin.php?page=tf_slider_list') . '" target="_blank">Sliders</a> page.',
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
        'value' => tfuse_options('doctor_header_image'),
        'type' => 'upload'
    )
);

?>