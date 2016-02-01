<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta name="globalsign-domain-verification" content="hyqJSPTNuCPEcNSTrAUohOWq-EZnujwjg6BEdOAE-q" />
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
    <title><?php
	if(tfuse_options('disable_tfuse_seo_tab'))
       {wp_title( '|', true, 'right' );bloginfo( 'name' );
	   $site_description = get_bloginfo( 'description', 'display' );
	   if ( $site_description && ( is_home() || is_front_page() ) )
	   echo " | $site_description";}
	else wp_title(''); ?>
    </title>
    <?php tfuse_meta(); ?>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php
        global $is_tf_blog_page;
        if ( is_singular() && get_option( 'thread_comments' ) )
                wp_enqueue_script( 'comment-reply' );

        tfuse_head();
        wp_head();
    ?>
</head>
<body <?php body_class(); ?>>
    <div class="body_wrap">
        <div class="header">
            <div class="header_top">
                <div class="container">
                    <div class="logo">
                        <a href="<?php echo home_url() ; ?>" title="<?php bloginfo('description'); ?>">
                            <img src="<?php echo tfuse_logo(); ?>" alt="<?php bloginfo('name'); ?>"  border="0" />
                        </a>
                    </div><!--/ .logo -->
                    <div class="header_middle">
                    	<a href="/pay-your-bill/">Pay your Bill</a>
                    </div>
                    <div class="header_contacts">
                    <?php echo do_shortcode( tfuse_options('header_text_box') ); ?>
                    </div>
                </div><!--/ .container -->
            </div><!--/ .header_top -->

            <div class="header_menu">
                <div class="container">
                    <?php  tfuse_menu('default');  ?>
                </div><!--/ .container -->
            </div><!--/ .header_menu -->
            <?php tfuse_header_content(); ?>
        </div><!--/ .header -->
        <?php if($is_tf_blog_page) tfuse_category_on_blog_page(); ?>