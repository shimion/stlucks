<?php

/**
 * Doctors
 *
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 *
 * Optional arguments:
 * items:
 * title:
 * image_width:
 * image_height:
 * image_class:
 */
function tfuse_spec_doctor($atts, $content = null) {
    extract(shortcode_atts(array(
                'items' => 4,
                'title' => '',
                'image_width' => 115,
                'image_height' => 152,
                'image_class' => 'thumbnail',
                'specialites' => '',
                    ), $atts));

    $return_html = !empty($title) ? '<h2>' . $title . '</h2>' : '';
    $latest_posts = tfuse_shortcode_posts(array(
        'sort' => 'recent',
        'items' => $items,
        'image_post' => true,
        'image_width' => $image_width,
        'image_height' => $image_height,
        'image_class' => $image_class,
        'date_post' => false,
        'post_type' => 'doctors',
        'specialites' => $specialites,
            ));

    foreach ($latest_posts as $post_val):
        $return_html .= $post_val['post_img'] . '
					<h3 class="title_pink text_italic">' . $post_val['post_title'] . '</h3>
                    ' . $post_val['post_excerpt'] . '
                    <div class="divider_space_thin"></div>';
    endforeach;

    return $return_html;
}

$atts = array(
    'name' => __('Doctors', 'tfuse'),
    'desc' => __('Here comes some lorem ipsum description for the box shortcode.', 'tfuse'),
    'category' => 9,
    'options' => array(
        array(
            'name' => __('Title', 'tfuse'),
            'desc' => __('Specifies the title for an shortcode', 'tfuse'),
            'id' => 'tf_shc_doctors_title',
            'value' => '',
            'type' => 'text'
        ),
        array(
            'name' => __('Items', 'tfuse'),
            'desc' => __('Specifies the number of the doctors to show', 'tfuse'),
            'id' => 'tf_shc_doctors_items',
            'value' => '4',
            'type' => 'text'
        ),
        array(
            'name' => __('Image Width', 'tfuse'),
            'desc' => __('Specifies the width of an thumbnail', 'tfuse'),
            'id' => 'tf_shc_doctors_image_width',
            'value' => '115',
            'type' => 'text'
        ),
        array(
            'name' => __('Image Height', 'tfuse'),
            'desc' => __('Specifies the height of an thumbnail', 'tfuse'),
            'id' => 'tf_shc_doctors_image_height',
            'value' => '152',
            'type' => 'text'
        ),
        /* add the fllowing option in case shortcode has content */
        array(
            'name' => __('Class', 'tfuse'),
            'desc' => __('Specifies one or more class names for an thumbnail, separated by space. ', 'tfuse'),
            'id' => 'tf_shc_doctors_image_class',
            'value' => 'frame_box alignright',
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('doctors', 'tfuse_spec_doctor', $atts);
