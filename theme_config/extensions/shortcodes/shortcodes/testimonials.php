<?php

/**
 * Testimonials
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * title:
 * order: RAND, ASC, DESC
 */
function tfuse_testimonials($atts, $content = null) {
    global $testimonials_uniq;
    extract(shortcode_atts(array('title' => '', 'order ' => 'RAND'), $atts));

    $slide = $nav = $single = '';

    $testimonials_uniq = rand(1, 300);

    if (!empty($title))
        $title = '<h3>' . $title . '</h3>';

    if (!empty($order) && ($order == 'ASC' || $order == 'DESC'))
        $order = '&order=' . $order;
    else
        $order = '&orderby=rand';

    query_posts('post_type=testimonials&posts_per_page=-1' . $order);
    $k = 0;
    if (have_posts()) {
        while (have_posts()) {
            $k++;
            the_post();
            global $more; $more = 0;
            $positions = '';
            $terms = get_the_terms(get_the_ID(), 'positions');

            if (!is_wp_error($terms) && !empty($terms))
                foreach ($terms as $term)
                    $positions .= ', ' . $term->name;

            $slide .= '
                <div class="slide">
                    <div class="quote-text">
                    ' . get_the_content() . '
                    </div>
                    <div class="quote-author">
                        ' . get_the_title() . '
                        ' . $positions . '
                    </div>
                </div>
        ';
        } // End WHILE Loop
    } // End IF Statement
    wp_reset_query();

    if ($k > 1) {
        $nav = '<a href="#" class="prev"></a> <a href="#" class="next"></a>';
    }
    else
        $single = ' style="display: block"';

    $output = '
    <div id="testimonials' . $testimonials_uniq . '" class="slideshow slideQuotes">
        ' . $title . '
        <div class="slides_container"' . $single . '>
        ' . $slide . '
        </div><!--/ .slides_container -->
        ' . $nav . '
    </div><!--/ .slideshow slideQuotes -->
    <script language="javascript" type="text/javascript">
       jQuery(document).ready(function($){
            $("#testimonials' . $testimonials_uniq . '").slides({
                hoverPause: true,
                play: 9000,
                autoHeight: true,
                pagination: false,
                generatePagination: false,
                effect: "fade",
                fadeSpeed: 150});
        });
    </script>';

    return $output;
}

$atts = array(
    'name' => __('Testimonials', 'tfuse'),
    'desc' => __('Here comes some lorem ipsum description for the box shortcode.', 'tfuse'),
    'category' => 11,
    'options' => array(
        array(
            'name' => __('Title', 'tfuse'),
            'desc' => __('Specifies the title of an shortcode', 'tfuse'),
            'id' => 'tf_shc_testimonials_title',
            'value' => 'Testimonials',
            'type' => 'text'
        ),
        array(
            'name' => __('Order', 'tfuse'),
            'desc' => __('Select display order', 'tfuse'),
            'id' => 'tf_shc_testimonials_order',
            'value' => 'DESC',
            'options' => array(
                'RAND' => __('Random', 'tfuse'),
                'ASC' => __('Ascending', 'tfuse'),
                'DESC' => __('Descending', 'tfuse')
            ),
            'type' => 'select'
        )
    )
);

tf_add_shortcode('testimonials', 'tfuse_testimonials', $atts);
