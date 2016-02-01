<?php
/**
 * ThmeFuse Appoiment
 *
 * To override this function in a child theme, copy this file to your child theme's
 * /theme_config/theme_includes/ folder.
 * 
 * /theme_config/theme_includes/APPOIMENT.php
 * 
 * @version 2.0
 */

// don't load from wordpress, load directly with ajax
if ( defined('ABSPATH') )
	return;

global $TFUSE;

// include wordpress functionality
require( rtrim($_SERVER['DOCUMENT_ROOT'], '/').'/wp-config.php');
$wp->init();
$wp->parse_request();
$wp->query_posts();
$wp->register_globals();


// -------------- START EDITING FROM HERE --------------

if ( !$TFUSE->request->empty_POST('email') )
{	
    $errorC = false;

    $the_blogname   = esc_attr(get_bloginfo('name'));
    $the_myemail    = esc_attr(get_bloginfo('admin_email'));
    $the_email      = esc_attr($TFUSE->request->POST('email'));
    $the_name       = esc_attr($TFUSE->request->POST('name'));
    $the_date_in    = esc_attr($TFUSE->request->POST('date_in_input'));
    $the_type       = esc_attr($TFUSE->request->POST('reserv_type'));

    # want to add aditional fields? just add them to the form in content-appoiment.php,
    # you dont have to edit this file

    //added fields that are not set explicit like the once above are combined and added before the actual message
    $already_used = array('email','name','date_in_input','reserv_type','ajax');
    $attach = '';

    foreach ($TFUSE->request->POST() as $key => $field)
    {
        if(!in_array($key,$already_used))
            $attach .= $key . ': ' . $field . '<br />' . PHP_EOL;
    }
    $attach .= '<br />' . PHP_EOL;

    if( !is_email($the_email) )
        $errorC = true;


    if($errorC == false)
    {
        $to      =  $the_myemail;
        $subject = __('New Reservation from ','tfuse') . $the_blogname;
        $header  = 'MIME-Version: 1.0' . PHP_EOL;
        $header .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
        $header .= __('From:','tfuse'). $the_email  . PHP_EOL;

        if(!empty($the_email)) 	$the_email 	= __('Email: ','tfuse').$the_email .'<br />';
        if(!empty($the_name)) 	$the_name 	= __('Name: ','tfuse').$the_name .'<br />';
        if(!empty($the_date_in)) 	$the_date_in 	= __('Check-in date: ','tfuse').$the_date_in .'<br />';
        if(!empty($the_type)) 	$the_type 	= __('Medical department: ','tfuse').$the_type .'<br />';

        $message = __('You have a new reservation request! ','tfuse').'<br />'.
        $the_email.
        $the_name.
        $the_date_in.
        $the_type.
        $attach. '<br />';

        if ( mail($to,$subject,$message,$header) ) $send = true; else $send = false;

        if ( $TFUSE->request->isset_POST('ajax') && $send )
            echo 'true';
    }
}
?>