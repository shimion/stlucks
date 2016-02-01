<?php
/**
 * The template for displaying content in the template-appoiments.php template.
 * To override this template in a child theme, copy this file 
 * to your child theme's folder.
 *
 * @since Medica 2.0
 */
?>

<?php
    wp_enqueue_script( 'appoiment', tfuse_get_file_uri('js/appoiment.js'), array('jquery'), '2.0', true );

    // split the phrase by any number of commas or space characters,
    // which include " ", \r, \t, \n and \f
    $days = preg_split("/[\s,]+/", tfuse_options('reserved_days'));

    $params = array(
            'appoiment_uri' => tfuse_get_file_uri('theme_config/theme_includes/APPOIMENT.php'),
            'bookedDays' => $days
            );

    wp_localize_script( 'appoiment', 'AppoimentParams', $params );

    add_action( 'wp_footer', create_function( '', 'wp_print_scripts( "appoiment" );' ) );
?>

<div class="widget-container widget_reservation">
    <form id="reservationForm" action="" method="post" class="reservationForm" name="reservationForm"> 

        <!-- column 1 -->
        <div class="col col_1_2 alpha">

            <div class="row field_select">
                <label><?php _e('Choose medical department','tfuse'); ?>:</label><br />
                <select class="select_styled" name="reserv_type" id="reserv_type">
                    <option value="Cardiology"><?php _e('Cardiology','tfuse'); ?></option>
                    <option value="Diabetes"><?php _e('Diabetes','tfuse'); ?></option>
                    <option value="Orthopedics"><?php _e('Orthopedics','tfuse'); ?></option>
                    <option value="Physiotherapy"><?php _e('Physiotherapy','tfuse'); ?></option>
                    <option value="Dental_Care"><?php _e('Dental Care','tfuse'); ?></option>
                </select>
            </div>

            <div class="row field_text">
                <label><?php _e('Your full name:','tfuse'); ?></label><br />
                <input name="name" value="" id="name" class="inputtext required" size="40" type="text" />
            </div>

            <div class="row field_text">
                <label><?php _e('Your email address:','tfuse'); ?></label><br />
                <input name="email" value="" id="email" class="inputtext required" size="40" type="text" />
            </div>

            <div class="row">
                <a href="#" id="sending" class="button_link"><img src="<?php echo get_template_directory_uri()?>/images/ajax-loader.gif" alt="sending" /> <span><?php _e('sending ...','tfuse'); ?></span></a>
                <input type="submit" id="send" class="btn-send" value="<?php _e('MAKE APPOINTMENT', 'tfuse') ?>" />
            </div>

        </div>
        <!--/ column 1 -->

        <!-- column 2 -->
        <div class="col col_1_2 omega">

            <div class="row field_date">
                <label><?php _e('Choose a date for the appointment:', 'tfuse') ?></label><br />
                <div id="date_in"></div>
                <input name="date_in_input" value="" id="date_in_input" type="hidden" />
                <div class="notice_table">
                    <span class="square-green"><?php _e('your selection', 'tfuse') ?></span>
                    <span class="square-disable"><?php _e('not available', 'tfuse') ?></span>
                </div>
            </div>

        </div>
        <!--/ column 2 -->

        <div class="field_submit">
            <div class="notice"><?php _e('Please note that this is not an actual appointment, but only a request for one. We will contact you for a confirmation shortly after. Thank you! By clicking the "Make an Appointment" button you agree to the Terms & Conditions below.', 'tfuse') ?></div>
        </div>
    </form>

    <div id="reservation_send_ok" class="notice">
        <h2><?php _e('Your message has been sent!', 'tfuse') ?></h2>
        <?php _e('Thank you for contacting us,', 'tfuse') ?><br /><?php _e('We will get back to you within 2 business days.', 'tfuse') ?>
    </div>

    <div id="reservation_send_failure" class="notice">
        <h2><?php _e('Oops!', 'tfuse') ?></h2>
        <?php _e('Due to an unknown error, your form was not submitted, please resubmit it or try later.', 'tfuse') ?>
    </div>

</div><!--/ .widget_reservation -->
