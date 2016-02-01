<?php
/**
 * The template for displaying Play Slider.
 * To override this template in a child theme, copy this file to your 
 * child theme's folder /theme_config/extensions/slider/designs/play/
 * 
 * If you want to change style or javascript of this slider, copy files to your 
 * child theme's folder /theme_config/extensions/slider/designs/play/static/
 * and change get_template_directory() with get_stylesheet_directory()
 */

$interval = 4000;
if(isset($slider['general']['slider_interval']))
    $interval = $slider['general']['slider_interval'];

$TFUSE->include->register_type('slider_css_folder', get_template_directory() . '/theme_config/extensions/slider/designs/'.$slider['design'].'/static/css');
$TFUSE->include->css('playSlider', 'slider_css_folder', 'tf_head');

$TFUSE->include->register_type('slider_js_folder', get_template_directory() . '/theme_config/extensions/slider/designs/'.$slider['design'].'/static/js');
$TFUSE->include->js('playSlider', 'slider_js_folder', 'tf_footer');
$TFUSE->include->js_enq('img_url', get_template_directory_uri());
$TFUSE->include->js('playSliderOptions', 'slider_js_folder', 'tf_footer');
?>
<script type="text/javascript">/* <![CDATA[ */
    tf_slider_interval={"interval":"<?php echo $interval; ?>"};
/* ]]> */</script>
<!-- header image/slider -->
<div class="header_bot header_slider">
    <div class="container">

        <!-- playSlider -->
        <div class="playSlider">
            <ul class="slide-content">
                <?php foreach ($slider['slides'] as $slide) : ?>
                    <li>
                        <div class="textHolder">
                            <h3><?php echo $slide['slide_tab_title']; ?></h3>
                            <p><span><strong><a href="<?php echo $slide['slide_url']; ?>"><?php echo $slide['slide_title']; ?></a></strong><?php echo $slide['slide_subtitle']; ?> </span></p>
                        </div>
                        <img src="<?php echo $slide['slide_src']; ?>" alt="<?php echo $slide['slide_title']; ?>" width="960" height="444" />
                    </li>

                <?php endforeach; ?>
            </ul>
            <div class="progressBar"><div class="progressIndicator"></div></div>
        </div>
        <!--/ playSlider -->

    </div>
</div>
<!--/ header image/slider -->