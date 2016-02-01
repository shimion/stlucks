<?php

/**
 * Boxes
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * type: info, note, download, warrning or custom css classes e.g. download box_border
 * color: color name or hexadecimal color code e.g. blue, #dbecf8
 * style: custom css style
 */
function tfuse_box($atts, $content = null) {
    extract(shortcode_atts(array('type' => '', 'style' => '', 'color' => '#dbecf8'), $atts));

    if (!empty($color))
        $color = 'background-color:' . $color . ';';

    if (!empty($color) || !empty($style))
        $style = ' style="' . $color . $style . '"';

    return '<div class="box ' . $type . '"' . $style . '><span class="icontype"></span>' . do_shortcode($content) . '</div>';
}

$atts = array(
    'name' => __('Box', 'tfuse'),
    'desc' => __('Here comes some lorem ipsum description for the box shortcode.', 'tfuse'),
    'category' => 7,
    'options' => array(
        array(
            'name' => __('Type', 'tfuse'),
            'desc' => __('Specify type of the box', 'tfuse'),
            'id' => 'tf_shc_box_type',
            'value' => '',
            'options' => array(
                'info' => __('Info Box', 'tfuse'),
                'warrning' => __('Warrning Box', 'tfuse'),
                'download' => __('Download Box', 'tfuse'),
                'note' => __('Note Box', 'tfuse'),
            ),
            'type' => 'select'
        ),
        array(
            'name' => __('Style', 'tfuse'),
            'desc' => __('Specify an inline style for an shortcode', 'tfuse'),
            'id' => 'tf_shc_box_style',
            'value' => '',
            'type' => 'text'
        ),
        array(
            'name' => __('Color', 'tfuse'),
            'desc' => __('Choose background color for an shortcode', 'tfuse'),
            'id' => 'tf_shc_box_color',
            'value' => '#dbecf8',
            'type' => 'colorpicker'
        ),
        /* add the fllowing option in case shortcode has content */
        array(
            'name' => __('Content', 'tfuse'),
            'desc' => __('Enter shortcode content', 'tfuse'),
            'id' => 'tf_shc_box_content',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('box', 'tfuse_box', $atts);
