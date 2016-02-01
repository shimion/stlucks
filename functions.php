<?php




// Button
function wpm_testimonials($atts, $content = null ) {	
	extract(shortcode_atts(array(
		'name' => '',	
    ), $atts));	
	return '

<div class="slideshow slideQuotes" style="margin-bottom: 0px;">
<div class="slides_container" style="background: none; width: 100%; display: block;">
<div class="quote-text">'.$content.'</div>
<div class="quote-author">'.$name.'</div>
</div>
</div>
	';
}
add_shortcode('testimonial', 'wpm_testimonials');

/**

 * WARNING: This file is part of the core ThemeFuse Framework. It is not recommended to edit this section

 *

 * @package ThemeFuse

 * @since 2.0

 */

require_once(get_template_directory() . '/framework/BootsTrap.php');

require_once(get_template_directory() . '/theme_config/theme_includes/AJAX_CALLBACKS.php');

// posts per page based on CPT
function iti_custom_posts_per_page($query)
{
    switch ( $query->query_vars['type'] )
    {
        case 'holiday':  // Post Type named 'iti_cpt_1'
            $query->query_vars['posts_per_page'] = 100;
            break;


        default:
            break;
    }
    return $query;
}

if( !is_admin() )
{
    add_filter( 'pre_get_posts', 'iti_custom_posts_per_page' );
}

function form_selector( $atts ){
	$html = '<form>
	<label style="    color: #183e75;    font-weight: bold;" id="first_click"><input type="radio" name="pass_value" value="healthcare-survey-clinic" /><span>Hospital/ER Visit Survey<span></label>
	<label style="    color: #183e75;    font-weight: bold;" id="sec_click"><input type="radio" name="pass_value" value="healthcare-survey-clinic" /><span>Crosby Clinic Visit Survey</span></label>
</form>
<script>
jQuery(document).ready(function($) {
$("#first_click").click(function() {
   // var value = $("input:radio[name=pass_value]:checked").val();
    window.location.href = "http://www.dcstlukes.org/healthcare-survey-hospital/";
});
$("#sec_click").click(function() {
   // var value = $("input:radio[name=pass_value]:checked").val();
    window.location.href = "http://www.dcstlukes.org/healthcare-survey-clinic/";
});
});
</script>';
	return $html;
}
add_shortcode( 'form', 'form_selector' );
