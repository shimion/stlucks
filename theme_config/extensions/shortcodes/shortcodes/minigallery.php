<?php

/**
 * Minigallery
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * id: post/page id
 * order: ASC, DESC
 * orderby:
 * include:
 * exclude:
 * pretty: true/false use or not prettyPhoto
 * icon_plus:
 * class: css class e.g. boxed
 * carousel: jCarousel Configuration. http://sorgalla.com/projects/jcarousel/
 */

function tfuse_minigallery($attr, $content = null)
{
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
            'order'      => 'ASC',
            'orderby'    => 'menu_order ID',
            'id' => isset($post->ID) ? $post->ID : $attr['id'],
            'include'    => '',
            'exclude'    => '',
            'pretty'     => true,
            'icon_plus'  => '<span></span>',
            'carousel'   => 'easing: "easeInOutQuint",animation: 600',
            'class'      => 'boxed'
    ), $attr));

    if ( !empty($include) ) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace('/[^0-9,]+/', '', $exclude);
        $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    } else {
        $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    }

    if ( empty($attachments) )
        return '';

    $uniq = rand(1, 200);

    $out = '
    <script type="text/javascript">
        jQuery(document).ready(function($) {
        $("#mycarousel' . $uniq . '").jcarousel({
                ' . $carousel . '
            });
        });
    </script>
    ';

    $out .= '
    <div class="minigallery-list minigallery ' . $class . '">
        <ul id="mycarousel' . $uniq . '" class="jcarousel-skin-tango">';

    if ($icon_plus)
        $out .= '<span></span>';

    foreach ($attachments as $id => $attachment)
    {

        if ( $pretty )
            $out .= '<li><a href="' . $attachment->guid . '" rel="prettyPhoto[gallery' . $uniq . ']">'
                    . '<img src="'. TF_GET_IMAGE::get_src_link($attachment->guid, 102, 102) . '" alt=' . $attachment->post_title . '>' . $icon_plus . '</a></li>';
        else
            $out .= '<li>' . '<img src="'. TF_GET_IMAGE::get_src_link($attachment->guid, 102, 102) . '" alt=' . $attachment->post_title . '>' . '</li>';
    }

    $out .= '
        </ul>
    </div>
    <div class="clear"></div>
    ';

    return $out;
}

$atts = array(
    'name' => __('Minigallery', 'tfuse'),
    'desc' => __('Here comes some lorem ipsum description for the box shortcode.', 'tfuse'),
    'category' => 6,
    'options' => array(
        array(
            'name' => __('ID', 'tfuse'),
            'desc' => __('Specifies the post or page ID. For more detail about this shortcode follow the <a href="http://codex.wordpress.org/Template_Tags/get_posts" target="_blank">link</a>', 'tfuse'),
            'id' => 'tf_shc_minigallery_id',
            'value' => '',
            'type' => 'text'
        )
    )
);

tf_add_shortcode('minigallery', 'tfuse_minigallery', $atts);
