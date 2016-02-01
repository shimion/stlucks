/**
 * ThmeFuse Appoiment Form
 *
 * To override this function in a child theme, copy this file to your child theme's
 * js folder.
 * /js/appoiment.js
 * 
 * @version 2.0
 */

jQuery(document).ready(function(){
	tfuse_appoiment_form();
});

function tfuse_appoiment_form()
{
    jQuery('#send').bind('click', function()
    {
        var my_error = false;
	jQuery('#reservationForm input, #reservationForm textarea, #reservationForm radio, #reservationForm select').each(function(i)
	{
            var surrounding_element = jQuery(this);
            var value               = jQuery(this).attr('value');
            var check_for           = jQuery(this).attr('id');
            var required            = jQuery(this).hasClass('required');

            if(check_for == 'email')
            {
                surrounding_element.removeClass('error valid');
                baseclases = surrounding_element.attr('class');
                if(!value.match(/^\w[\w|\.|\-]+@\w[\w|\.|\-]+\.[a-zA-Z]{2,4}$/)) {
                    surrounding_element.attr('class',baseclases).addClass('error');
                    my_error = true;
                } else {
                    surrounding_element.attr('class',baseclases).addClass('valid');
                }
            }

            if(required && check_for != 'email')
            {
                surrounding_element.removeClass('error valid');
                baseclases = surrounding_element.attr('class');
                if(value == '') {
                    surrounding_element.attr('class',baseclases).addClass('error');
                    my_error = true;
                } else {
                    surrounding_element.attr('class',baseclases).addClass('valid');
                }
            }

            if(jQuery('#reservationForm input, #reservationForm textarea, #reservationForm radio, #reservationForm select').length  == i+1 && my_error == false)
            {
                jQuery('#reservationForm div.notice, #reservationForm #send').hide();
                jQuery('#reservationForm #sending').css('display','inline-block');

                var $datastring = 'ajax=true';
                jQuery('#reservationForm input, #reservationForm textarea, #reservationForm radio, #reservationForm select').each(function(i)
                {
                    var $name = jQuery(this).attr('name');
                    var $value = encodeURIComponent(jQuery(this).attr('value'));
                    $datastring = $datastring + '&' + $name + '=' + $value;
                });

                jQuery.ajax({
                type: 'POST',
                url: AppoimentParams.appoiment_uri,
                data: $datastring,
                    success: function(response)
                    {
                        jQuery('#reservationForm').hide();
                        jQuery('#reservationForm #sending').hide();
                        jQuery('#reservationForm #send').show();
                
                        if ( response == 'true' )
                        {
                            jQuery('#reservation_send_ok').show();
                        }
                        else
                        {
                            jQuery('#reservation_send_failure').show();
                        }
                        jQuery('#reservationForm input[type="text"], #reservationForm textarea, #reservationForm radio, #reservationForm select').val('');
                    }
                });
                
            }

        });
        return false;
    });
}

jQuery(function($)
{
    var bookedDays = ['2011-12-31','2012-1-14','2012-2-14'];
    // AppoimentParams.bookedDays is taken from framework Appoimnets tab
    $.merge( bookedDays, AppoimentParams.bookedDays )

    function assignCalendar(id)
    {
        $('<div class="calendar" />')
        .insertAfter( $(id) )
        .datepicker({
        dateFormat: 'dd-mm-yy',
        minDate: new Date(),
        maxDate: '+1y',
        altField: id,
        firstDay: 1,
        showOtherMonths: true,
        dayNamesMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
        beforeShowDay: isAvailable })
        .prev().hide();
    }

    function isAvailable(date)
    {
        var dateAsString = date.getFullYear().toString() + "-" + (date.getMonth()+1).toString() + "-" + date.getDate();
        var result = $.inArray( dateAsString, bookedDays ) ==-1 ? [true] : [false];
        return result
    }

    assignCalendar('#date_in_input');

});