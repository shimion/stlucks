jQuery(document).ready(function($) {

 $('.tfuse_selectable_code').live('click', function () {
        var r = document.createRange();
        var w = $(this).get(0);
        r.selectNodeContents(w);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(r);
    });
    $(document).bind({reservationform_preview:function(){
        $('select.select_styled').selectmenu({
            style:'dropdown'
        });
    },
        contact_form_preview_open:function(){
            $('select.select_styled').selectmenu({
                style:'dropdown'
            });
        }
    });
    $('#tf_rf_form_name_select').change(function(){
        $_get=getUrlVars();
        if($(this).val()==-1 && 'formid' in $_get){
            delete $_get.formid;
        } else if($(this).val()!=-1){
            $_get.formid=$(this).val();
        }
        $_url_str='?';
        $.each($_get,function(key,val){
            $_url_str +=key+'='+val+'&';
        })
        $_url_str = $_url_str.substring(0,$_url_str.length-1);
        window.location.href=$_url_str;
    });


    function getUrlVars() {
        urlParams = {};
        var e,
            a = /\+/g,
            r = /([^&=]+)=?([^&]*)/g,
            d = function (s) {
                return decodeURIComponent(s.replace(a, " "));
            },
            q = window.location.search.substring(1);
        while (e = r.exec(q))
            urlParams[d(e[1])] = d(e[2]);
        return urlParams;
    }
	
    $('#medica_framework_options_metabox .handlediv, #medica_framework_options_metabox .hndle').hide();
    $('#medica_framework_options_metabox .handlediv, #medica_framework_options_metabox .hndle').hide();

    var options = new Array();

    options['medica_header_element'] = jQuery('#medica_header_element').val();
    jQuery('#medica_header_element').bind('change', function() {
        options['medica_header_element'] = jQuery(this).val();   
        tfuse_toggle_options(options);
    });
    
    options['medica_page_title'] = jQuery('#medica_page_title').val();
    jQuery('#medica_page_title').bind('change', function() {
        options['medica_page_title'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });

    options['medica_homepage_category'] = jQuery('#medica_homepage_category').val();
    jQuery('#medica_homepage_category').bind('change', function() {
        options['medica_homepage_category'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });
    options['medica_blogpage_category'] = jQuery('#medica_blogpage_category').val();
    jQuery('#medica_blogpage_category').bind('change', function() {
        options['medica_blogpage_category'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });
    options['medica_header_element_blog'] = jQuery('#medica_header_element_blog').val();
    jQuery('#medica_header_element_blog').bind('change', function() {
        options['medica_header_element_blog'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });

    tfuse_toggle_options(options);

    function tfuse_toggle_options(options)
    {

        jQuery('#medica_select_slider, #medica_header_image, #medica_custom_title ').parents('.option-inner').hide();
        jQuery('#medica_select_slider, #medica_header_image, #medica_custom_title ').parents('.form-field').hide();

        if(options['medica_header_element'] == 'slider')
        {
            jQuery('#medica_select_slider').parents('.option-inner').show();
            jQuery('#medica_select_slider').parents('.form-field').show();
        }
        else if(options['medica_header_element'] == 'image')
        {
            jQuery('#medica_header_image').parents('.option-inner').show();
            jQuery('#medica_header_image').parents('.form-field').show();
        }

        if(options['medica_page_title'] == 'custom_title')
        {
            jQuery('#medica_custom_title').parents('.option-inner').show();
            jQuery('#medica_custom_title').parents('.form-field').show();
        }

        if(options['medica_homepage_category']=='all')
        {
            jQuery('.medica_categories_select_categ,.medica_home_page,.medica_content_bottom,.medica_use_page_options').hide();
            jQuery('#medica_header_element,#medica_content_bottom').closest('.postbox').show();
        }
        else if(options['medica_homepage_category']=='specific')
        {
            jQuery('#medica_header_element,#medica_content_bottom').closest('.postbox').show();
            jQuery('.medica_categories_select_categ').show();
            jQuery('.medica_content_bottom,.medica_use_page_options,.medica_home_page').hide();
        }
        else if(options['medica_homepage_category']=='page')
        {
            jQuery('.medica_categories_select_categ').hide();
            jQuery('.medica_home_page,.medica_content_bottom,.medica_use_page_options').show();
            if($('#medica_use_page_options').is(':checked')) jQuery('#medica_header_element,#medica_content_bottom').closest('.postbox').hide();
            $('#medica_use_page_options').live('change',function () {
                if(jQuery(this).is(':checked'))
                    jQuery('#medica_header_element,#medica_content_bottom').closest('.postbox').hide();
                else
                    jQuery('#medica_header_element,#medica_content_bottom').closest('.postbox').show();
            });
        }

        if(options['medica_blogpage_category']=='all')
            jQuery('.medica_categories_select_categ_blog').hide();
        else if(options['medica_blogpage_category']=='specific')
            jQuery('.medica_categories_select_categ_blog').show();

        jQuery('#medica_select_slider_blog, #medica_header_image_blog').parents('.option-inner').hide();
        jQuery('#medica_select_slider_blog, #medica_header_image_blog').parents('.form-field').hide();
        if(options['medica_header_element_blog'] == 'slider')
        {
            jQuery('#medica_select_slider_blog').parents('.option-inner').show();
            jQuery('#medica_select_slider_blog').parents('.form-field').show();
        }
        else if(options['medica_header_element_blog'] == 'image')
        {
            jQuery('#medica_header_image_blog').parents('.option-inner').show();
            jQuery('#medica_header_image_blog').parents('.form-field').show();
        }

    }
});