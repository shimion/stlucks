jQuery(document).ready(function($) {

    var showcase_dup = jQuery('.playSlider').clone();
    showcase_dup.attr('id', 'playSlider-dup');
    showcase_dup.hide();
    //jQuery('body').append(showcase_dup);

    function Defaults()
    {
        var screenRes = jQuery(window).width();
        var sliderWidth;
        var sliderHeight;

        if(screenRes >= 960)
        {
            sliderWidth = 960;
            sliderHeight = 444;
        }
        if(screenRes < 959)
        {
            sliderWidth = 768;
            sliderHeight = 444;
        }
        if(screenRes < 767)
        {
            sliderWidth = 480;
            sliderHeight = 444;
        }
        if(screenRes < 479)
        {
            sliderWidth = 320;
            sliderHeight = 148;
        }
        if(screenRes < 319)
        {
            sliderWidth = 960;
            sliderHeight = 444;
        }

        $('.playSlider').playSlider({
            content: ".slide-content",
            children: "li",
            transition: "fade",
            animationSpeed: 1000,
            easing: '',
            autoplay: true,
            autoplaySpeed: tf_slider_interval.interval,
            bullets: false,
            arrows: true,
            arrowsHide: false,
            keyBrowse: true,
            preloadImages: true,
            itemSize: {width: sliderWidth,height: sliderHeight},
            animationStart: function(){},
            animationComplete: function(){}
        });
    }

    Defaults();

    jQuery(window).resize(function()
    {
        jQuery('.playSlider').replaceWith(showcase_dup.clone().attr('class', 'playSlider').show());
        Defaults();
    })
});
