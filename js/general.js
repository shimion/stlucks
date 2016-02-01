/**
 * general js
 *
 * To override these functions in a child theme, copy this file to your child theme's
 * js folder.
 * /js/general.js
 * 
 * @version 2.1
 */

// Topmenu <ul> replace to <select>
function responsive(mainNavigation) {
	var $ = jQuery;
	var screenRes = $('.body_wrap').width();
	
	if ($('.topmenu select').length == 0) {
		/* Replace unordered list with a "select" element to be populated with options, and create a variable to select our new empty option menu */
		$('.topmenu').append('<select class="select_topmenu" id="topm-select" style="display:none;"></select>');
		var selectMenu = $('#topm-select');

			/* Navigate our nav clone for information needed to populate options */
			$(mainNavigation).children('ul').children('li').each(function () {

				/* Get top-level link and text */
				var href = $(this).children('a').attr('href');
				var text = $(this).children('a').text();

				/* Append this option to our "select" */
				if ($(this).is(".current-menu-item") && href != '#') {
					$(selectMenu).append('<option value="' + href + '" selected>' + text + '</option>');
				} else if (href == '#') {
					$(selectMenu).append('<option value="' + href + '" disabled="disabled">' + text + '</option>');
				} else {
					$(selectMenu).append('<option value="' + href + '">' + text + '</option>');
				}

				/* Check for "children" and navigate for more options if they exist */
				if ($(this).children('ul').length > 0) {
					$(this).children('ul').children('li').each(function () {

						/* Get child-level link and text */
						var href2 = $(this).children('a').attr('href');
						var text2 = $(this).children('a').text();

						/* Append this option to our "select" */
						if ($(this).is(".current-menu-item") && href2 != '#') {
							$(selectMenu).append('<option value="'+href2+'" selected> - '+text2+'</option>');
						} else if (href2 == '#') {
							$(selectMenu).append('<option value="'+href2+'" disabled="disabled"># '+text2+'</option>');
						} else {
							$(selectMenu).append('<option value="'+href2+'"> - '+text2+'</option>');
						}

						/* Check for "children" and navigate for more options if they exist */
						if ($(this).children('ul').length > 0) {
							$(this).children('ul').children('li').each(function () {

								/* Get child-level link and text */
								var href3 = $(this).children('a').attr('href');
								var text3 = $(this).children('a').text();

								/* Append this option to our "select" */
								if ($(this).is(".current-menu-item")) {
									$(selectMenu).append('<option value="' + href3 + '" class="select-current" selected> -- ' + text3 + '</option>');
								} else {
									$(selectMenu).append('<option value="' + href3 + '"> -- ' + text3 + '</option>');
								}

						});
					}
				});
			}
		});
	} 
	if(screenRes >= 750){
        $('.topmenu select:first').hide();
        $('.topmenu ul:first').show();      
    }else{
        $('.topmenu ul:first').hide();
        $('.topmenu select:first').show();             
    }

	/* When our select menu is changed, change the window location to match the value of the selected option. */
	$(selectMenu).change(function () {
		location = this.options[this.selectedIndex].value;
	});
}

jQuery(document).ready(function($) {

	// topmenu replace to select
	var mainNavigation = $('.topmenu').clone();
	responsive(mainNavigation);
	// reload topmenu on Resize
    $(window).resize(function() {		
        var screenRes = $('.body_wrap').width();
        responsive(mainNavigation);
    });	

    // dropdown menu
    $(".dropdown ul").parent("li").addClass("parent");
    $(".dropdown li:first-child").addClass("first");
    $(".dropdown li:last-child").addClass("last");
    $(".dropdown li:only-child").removeClass("last").addClass("only");	
    $(".dropdown .current-menu-item, .dropdown .current-menu-ancestor").prev().addClass("current-prev");		
	
	
    var screenRes = $(window).width();   	
    if (screenRes < 750) {		
	} 
	
    // cols
    $(".row .col:first-child").addClass("alpha");
    $(".row .col:last-child").addClass("omega");
    
    
    // tabs
    $("ul.tabs").tabs("> .tabcontent", {
            tabs: 'li', 
            effect: 'fade'
    });


    // widgets
    $(".recent_posts li:odd").addClass("odd");
    $(".popular_posts li:odd").addClass("odd");
    $(".widget-container li:even").addClass("even");


    // toggle content
    $(".toggle_content").hide(); 
    $(".toggle").toggle(function(){
            $(this).addClass("active");
            }, function () {
            $(this).removeClass("active");
    });
    $(".toggle").click(function(){
            $(this).next(".toggle_content").slideToggle(300,'easeInQuad');
    });


    // pricing
    $(".table-pricing tr:even").addClass("even");
    $(".table-pricing td.table-row-title:even").addClass("even");


    // gallery
    $(".gl_col_2 .gallery-item:nth-child(2n)").addClass("nomargin");


    // PrettyPhoto
	if($('a[rel="prettyPhoto"]') && screenRes > 600) {        	
		$('a[rel^="prettyPhoto"]').prettyPhoto({animationSpeed:'slow', slideshow:3000, autoplay_slideshow: false, social_tools:false});	
    }

    // buttons
    if (!$.browser.msie) {
            $(".button_styled").hover(function(){
                    $(this).stop().animate({"opacity": 0.8});
            },function(){
                    $(this).stop().animate({"opacity": 1});
            });
            $(".button_link").hover(function(){
                    $(this).stop().animate({"opacity": 0.8});
            },function(){
                    $(this).stop().animate({"opacity": 1});
            });
    }


    // scroll to top
    $(window).scroll(function () {
         if ($(this).scrollTop() != 0) {
             $('.link-top').fadeIn();
         } else {
             $('.link-top').fadeOut();
         }
     });
     $('.link-top').click(function () {
         $('body,html').animate({
             scrollTop: 0
         },
         1500);
     });

});