<?php

/**
 * Latest Posts
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

function tfuse_latest_post($atts, $content = null)
{
    extract(shortcode_atts(array(
                                'items' => 5,
                                'title' => 'Recent Posts',
                                'image_width' => 75,
                                'image_height' => 75,
                                'image_class' => 'thumbnail'
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
                                          ));
    $return_html .= '
    <div class="widget_recent_posts">
        <ul>';
    foreach ($latest_posts as $post_val):
        $return_html .= '<li>';
        $return_html .= '<a href="' . $post_val['post_link'] . '" class="post-title">' . $post_val['post_title'] . '</a>';
        $return_html .= '
                <div class="post-meta"><em>
                    ' . __('by ', 'tfuse') . '<a href="' . $post_val['post_author_link'] . '" class="author">' . $post_val['post_author_name'] . '</a>
                    <span class="separator">|</span>' . $post_val['post_comnt_numb_link'] . '</em>
                </div>';
        $return_html .= '
                <div class="extras">
                    ' . $post_val['post_img'] . '
                    ' . $post_val['post_excerpt'] . '
                </div>
                <a href="' . $post_val['post_link'] . '" class="link-arrow">' . __('Read more', 'tfuse') . '</a>';
        $return_html .= '</li>';
    endforeach;
    $return_html .='
        </ul>
    </div> ';

    return $return_html;
}

$atts = array(
    'name' => __('Latest Posts', 'tfuse'),
    'desc' => __('Here comes some lorem ipsum description for the box shortcode.', 'tfuse'),
    'category' => 11,
    'options' => array(
        array(
            'name' => __('Items', 'tfuse'),
            'desc' => __('Specifies the number of the post to show', 'tfuse'),
            'id' => 'tf_shc_latest_posts_items',
            'value' => '5',
            'type' => 'text'
        ),
        array(
            'name' => __('Title', 'tfuse'),
            'desc' => __('Specifies the title for an shortcode', 'tfuse'),
            'id' => 'tf_shc_latest_posts_title',
            'value' => 'Recent Posts',
            'type' => 'text'
        ),
        array(
            'name' => __('Image Width', 'tfuse'),
            'desc' => __('Specifies the width of an thumbnail', 'tfuse'),
            'id' => 'tf_shc_latest_posts_image_width',
            'value' => '75',
            'type' => 'text'
        ),
        array(
            'name' => __('Image Height', 'tfuse'),
            'desc' => __('Specifies the height of an thumbnail', 'tfuse'),
            'id' => 'tf_shc_latest_posts_image_height',
            'value' => '75',
            'type' => 'text'
        ),
        array(
            'name' => __('Image Class', 'tfuse'),
            'desc' => __('Specifies one or more class names for an shortcode. To specify multiple classes,<br /> separate the class names with a space, e.g. <b>"left important"</b>.', 'tfuse'),
            'id' => 'tf_shc_latest_posts_image_class',
            'value' => 'thumbnail',
            'type' => 'text'
        )
    )
);

tf_add_shortcode('latest_posts', 'tfuse_latest_post', $atts);
