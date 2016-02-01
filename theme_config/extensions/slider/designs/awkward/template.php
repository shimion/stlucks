<?php
/**
 * The template for displaying Awkward Showcase.
 * To override this template in a child theme, copy this file to your 
 * child theme's folder /theme_config/extensions/slider/designs/awkward/
 * 
 * If you want to change style or javascript of this slider, copy files to your 
 * child theme's folder /theme_config/extensions/slider/designs/awkward/static/
 * and change get_template_directory() with get_stylesheet_directory()
 */

$interval = 3000;
if(isset($slider['general']['slider_interval']))
    $interval = $slider['general']['slider_interval'];

$TFUSE->include->register_type('slider_css_folder', get_template_directory() . '/theme_config/extensions/slider/designs/'.$slider['design'].'/static/css');
$TFUSE->include->css('aw-showcase', 'slider_css_folder', 'tf_head');

$TFUSE->include->register_type('slider_js_folder', get_template_directory() . '/theme_config/extensions/slider/designs/'.$slider['design'].'/static/js');
$TFUSE->include->js('jquery.aw-showcase.min', 'slider_js_folder', 'tf_footer'); 
$TFUSE->include->js('awkward', 'slider_js_folder', 'tf_footer');
?>
<script type="text/javascript">/* <![CDATA[ */
    tf_slider_interval={"interval":"<?php echo $interval; ?>"};
/* ]]> */</script>
<!-- header image/slider -->
<div class="header_bot header_slider">
    <div class="container">
        <!-- showcase slider -->
        <div id="showcase" class="showcase">
            <?php foreach ($slider['slides'] as $slide) : ?>
                <div class="showcase-slide">
                    <div class="showcase-content">
                        <a href="<?php echo $slide['slide_url']; ?>">
                            <img src="<?php echo $slide['slide_src']; ?>" alt="<?php echo $slide['slide_title']; ?>" width="960" height="444" />
                            
<?php /*                            <div class="slide_subtitle_div" >
							<?php echo $slide['slide_subtitle']; ?>
                            </div>
*/?>
                        </a>
                    </div>
                    <div class="showcase-thumbnail">
                        <div class="showcase-thumbnail-content">
                            <h3><?php echo $slide['slide_title']; ?></h3>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!--/ showcase slider -->
    </div>
</div>
<!--/ header image/slider -->
