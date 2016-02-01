<?php

/**
 * FAQ
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * title: FAQ title
 */
function tfuse_faq($atts, $content = null) {
    global $faq_question, $faq_answer;

    extract(shortcode_atts(array('title' => 'Frequently asked questions:'), $atts));

    $faq_question = $faq_answer = '';
    $get_faqs = do_shortcode($content);
    $k = 0;

    if (empty($title))
        $title = '';
    else
        $title = '<h2>' . $title . '</h2>';

    $out = '<div class="faq_list">' . $title;
    while (isset($faq_question[$k])) {
        $out .= $faq_question[$k];
        $out .= $faq_answer[$k];
        $k++;
    }
    $out .= '
    </div>';

    return $out;
}

$atts = array(
    'name' => __('FAQ', 'tfuse'),
    'desc' => __('Here comes some lorem ipsum description for the box shortcode.', 'tfuse'),
    'category' => 8,
    'options' => array(
        array(
            'name' => __('Title', 'tfuse'),
            'desc' => __('Text to display above the FAQ', 'tfuse'),
            'id' => 'tf_shc_faq_title',
            'value' => 'Frequently asked questions:',
            'divider' => TRUE,
            'type' => 'text'
        ),
        array(
            'name' => __('Question', 'tfuse'),
            'desc' => '',
            'id' => 'tf_shc_faq_question',
            'value' => '',
            'properties' => array('class' => 'tf_shc_addable_0 tf_shc_addable'),
            'type' => 'text'
        ),
        array(
            'name' => __('Answer', 'tfuse'),
            'desc' => '',
            'id' => 'tf_shc_faq_answer',
            'value' => '',
            'properties' => array('class' => 'tf_shc_addable_1 tf_shc_addable tf_shc_addable_last'),
            'divider' => TRUE,
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('faq', 'tfuse_faq', $atts);

function tfuse_faq_question($atts, $content = null) {
    global $faq_question;
    $faq_question[] = '<div class="faq_question toggle"><span class="faq_q">Q:</span><span class="faq_title">' . do_shortcode($content) . '</span><span class="ico"></span></div>';
}

$atts = array(
    'name' => __('FAQ Question', 'tfuse'),
    'desc' => __('Here comes some lorem ipsum description for the box shortcode.', 'tfuse'),
    'category' => 7,
    'options' => array(
        /* add the fllowing option in case shortcode has content */
        array(
            'name' => __('Content', 'tfuse'),
            'desc' => __('Enter your enter question', 'tfuse'),
            'id' => 'tf_shc_faq_question_content',
            'value' => '',
            'type' => 'textarea'
        )
    )
);

add_shortcode('faq_question', 'tfuse_faq_question', $atts);

function tfuse_faq_answer($atts, $content = null) {
    global $faq_answer;
    $faq_answer[] = '<div class="faq_answer toggle_content"><p>' . do_shortcode($content) . '</p></div>';
}

$atts = array(
    'name' => __('FAQ Answer', 'tfuse'),
    'desc' => __('Here comes some lorem ipsum description for the box shortcode.', 'tfuse'),
    'category' => 7,
    'options' => array(
        /* add the fllowing option in case shortcode has content */
        array(
            'name' => __('Content', 'tfuse'),
            'desc' => __('Enter your enter answer', 'tfuse'),
            'id' => 'tf_shc_faq_answer_content',
            'value' => '',
            'type' => 'textarea'
        )
    )
);

add_shortcode('faq_answer', 'tfuse_faq_answer', $atts);
