jQuery(document).ready(function($) {
    var showcase_dup = jQuery('#showcase').clone();
    showcase_dup.attr('id', 'showcase-dup');
    showcase_dup.hide();

    function Defaults()
    {
        var screenRes = jQuery(window).width();
        var sliderType = (screenRes < 768) ? 'horizontal' : 'vertical';

        var sliderWidth;
        var sliderHeight;

        if(screenRes >= 960)
        {
            sliderWidth = 960;
            sliderHeight = 444;
        }
        if(screenRes < 959)
        {
            sliderWidth = 720;
            sliderHeight = 333;
        }
        if(screenRes < 767)
        {
            sliderWidth = 459;
            sliderHeight = 222;
        }
        if(screenRes < 479)
        {
            sliderWidth = 319;
            sliderHeight = 128;
        }
        if(screenRes < 319)
        {
            sliderWidth = 960;
            sliderHeight = 444;
        }

        $("#showcase").awShowcase({
            content_width:		sliderWidth,
            content_height:		sliderHeight,
            fit_to_parent:		false,
            auto:			true,
            interval:		tf_slider_interval.interval,
            continuous:		true,
            loading:		true,
            tooltip_width:		200,
            tooltip_icon_width:	32,
            tooltip_icon_height:    32,
            tooltip_offsetx:	18,
            tooltip_offsety:	0,
            arrows:			false,
            buttons:		false,
            btn_numbers:		false,
            keybord_keys:		true,
            mousetrace:		false,
            pauseonover:		true,
            stoponclick:		true,
            transition:		'fade',
            transition_delay:	1000,
            transition_speed:	800,
            show_caption:		'onhover',
            thumbnails:		true,
            thumbnails_position:    'inside-last',
            thumbnails_direction:   sliderType,
            thumbnails_slidex:	0,
            dynamic_height:		false,
            speed_change:		true,
            viewline:		false
        });

    }

    Defaults();

    jQuery(window).resize(function(){
        jQuery('#showcase').replaceWith(showcase_dup.clone().attr('id', 'showcase').show());
        Defaults();
    })
});
