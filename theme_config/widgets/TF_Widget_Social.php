<?php
class TF_Widget_Social extends WP_Widget
{

	function TF_Widget_Social()
    {
		$widget_ops = array('classname' => 'widget_social', 'description' => __( 'Add Social Networks in Sidebar ','tfuse') );
		$this->WP_Widget('social', __('TFuse Social Widgets','tfuse'), $widget_ops);
	}

	function widget( $args, $instance )
    {
		extract($args);


        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

		$before_widget = ' <div class="widget-container widget_social_contacts">';
		$after_widget = '</div>';
		$before_title = '<h3 class="widget-title">';
		$after_title = '</h3>';
        $tfuse_title = (!empty($title)) ? $before_title .tfuse_qtranslate($title) .$after_title : '';

		echo $before_widget;

		// echo widgets title
        echo $tfuse_title;
        echo '<div class="social-box">';

            if ( $instance['facebook'] != '')
            {?>
                <div class="row social-facebook">
                    <?php if( $instance['facebook_id'] != ''){ $tfuse_social_name = $instance['facebook_id']; ?><span><?php _e('Facebook.com/','tfuse'); ?></span><?php } else $tfuse_social_name = $instance['facebook']; ?>
                    <a href="<?php echo $instance['facebook']; ?>"><?php echo $tfuse_social_name; ?></a>
                </div>
            <?php }
            if ( $instance['skype'] != '')
            {?>
                <div class="row social-skype">
                    <span><?php _e('Skype ID: ','tfuse'); ?>&nbsp;</span>
                    <p class="skype_nick"><?php echo $instance['skype']; ?></p>
                </div>
            <?php }
            if ( $instance['twitter'] != '')
            {?>
                <div class="row social-twitter">
                    <?php if( $instance['twitter_id'] != ''){ $tfuse_social_name = $instance['twitter_id']; ?><span><?php _e('Twitter.com/','tfuse'); ?></span><?php } else $tfuse_social_name = $instance['twitter']; ?>
                    <a href="<?php echo $instance['twitter']; ?>"><?php echo $tfuse_social_name; ?></a>
                </div>
            <?php }
            if ( $instance['dribbble'] != '')
            {?>
                <div class="row social-dribble">
                    <?php if( $instance['dribbble_id'] != ''){ $tfuse_social_name = $instance['dribbble_id']; ?><span><?php _e('Dribbble.com/','tfuse'); ?></span><?php } else $tfuse_social_name = $instance['dribbble']; ?>
                    <a href="<?php echo $instance['dribbble']; ?>"><?php echo $tfuse_social_name; ?></a>
                </div>
            <?php }
            if ( $instance['linkedin'] != '')
            {?>
                <div class="row social-linkedin">
                    <?php if( $instance['linkedin_id'] != ''){ $tfuse_social_name = $instance['linkedin_id']; ?><span><?php _e('LinkedIn.com/','tfuse'); ?></span><?php } else $tfuse_social_name = $instance['linkedin']; ?>
                    <a href="<?php echo $instance['linkedin']; ?>"><?php echo $tfuse_social_name; ?></a>
                </div>
            <?php }

            if ( $instance['flickr'] != '')
            {?>
                <div class="row social-flickr">
                    <?php if( $instance['flickr_id'] != ''){ $tfuse_social_name = $instance['flickr_id']; ?><span><?php _e('Flickr.com/','tfuse'); ?></span><?php } else $tfuse_social_name = $instance['flickr']; ?>
                    <a href="<?php echo $instance['flickr']; ?>"><?php echo $tfuse_social_name; ?></a>
                </div>
            <?php }
            if ( $instance['deviantart'] != '')
            {?>
                <div class="row social-deviantart">
                    <?php if( $instance['deviantart_id'] != ''){ $tfuse_social_name = $instance['deviantart_id']; ?><span><?php _e('Deviantart.com/','tfuse'); ?></span><?php } else $tfuse_social_name = $instance['deviantart']; ?>
                    <a href="<?php echo $instance['deviantart']; ?>"><?php echo $tfuse_social_name; ?></a>
                </div>
            <?php }
            if ( $instance['rss'] != '')
            {?>
                <div class="row social-rss">
                    <?php if( $instance['rss_id'] != ''){ $tfuse_social_name = $instance['rss_id']; ?><span><?php _e('Feedburner.com','tfuse'); ?></span><?php } else $tfuse_social_name = $instance['rss']; ?>
                    <a href="<?php echo $instance['rss']; ?>"><?php echo $tfuse_social_name; ?></a>
                </div>
            <?php }

        echo '</div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance )
    {
		$instance = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance, array( 'linkedin' => '','linkedin_id' => '','skype' => '','rss' => '','rss_id' => '', 'facebook' => '','facebook_id' => '', 'twitter' => '', 'twitter_id' => '','dribbble' => '','dribbble_id' => '', 'flickr' => '','flickr_id' => '', 'deviantart' => '','deviantart_id' => '', 'title' =>'') );

        $instance['title']      = $new_instance['title'];
        $instance['facebook']   = $new_instance['facebook'] ? $new_instance['facebook'] : '';
        $instance['facebook_id']   = $new_instance['facebook_id'] ? $new_instance['facebook_id'] : '';
        $instance['twitter']    = $new_instance['twitter'] ? $new_instance['twitter'] : '';
        $instance['twitter_id']    = $new_instance['twitter_id'] ? $new_instance['twitter_id'] : '';
        $instance['dribbble']   = $new_instance['dribbble'] ? $new_instance['dribbble'] : '';
        $instance['dribbble_id']   = $new_instance['dribbble_id'] ? $new_instance['dribbble_id'] : '';
        $instance['flickr']     = $new_instance['flickr'] ? $new_instance['flickr'] : '';
        $instance['flickr_id']     = $new_instance['flickr_id'] ? $new_instance['flickr_id'] : '';
        $instance['deviantart'] = $new_instance['deviantart'] ? $new_instance['deviantart'] : '';
        $instance['deviantart_id'] = $new_instance['deviantart_id'] ? $new_instance['deviantart_id'] : '';
        $instance['rss']        = $new_instance['rss'] ? $new_instance['rss'] : '';
        $instance['rss_id']        = $new_instance['rss_id'] ? $new_instance['rss_id'] : '';
        $instance['skype']        = $new_instance['skype'] ? $new_instance['skype'] : '';
        $instance['linkedin']        = $new_instance['linkedin'] ? $new_instance['linkedin'] : '';
        $instance['linkedin_id']        = $new_instance['linkedin_id'] ? $new_instance['linkedin_id'] : '';

		return $instance;
	}

	function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array( 'title'=>'', 'skype' => '','linkedin' => '','linkedin_id' => '','rss' => '','rss_id' => '', 'facebook' => '','facebook_id' => '', 'twitter' => '','twitter_id' => '','dribbble' => '','dribbble_id' => '', 'flickr' => '','flickr_id' => '', 'deviantart' => '','deviantart_id' => '') );
        $title = $instance['title'];
?>
    <style type="text/css">
        .widget_social_name, .widget_social_link {
            width:185px;
        }
        .widget_social_link{
            margin-left: 11px;
        }
        .tfuse_wd_skype{
            width:161px!important;
        }
    </style>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','tfuse'); ?></label><br/>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:','tfuse'); ?></label><br/>
        <span><?php _e('Link:','tfuse'); ?></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($instance['facebook']); ?>" />
        <span><?php _e('Name:','tfuse'); ?></span> <input class="widefat widget_social_name" id="<?php echo $this->get_field_id('facebook_id'); ?>" name="<?php echo $this->get_field_name('facebook_id'); ?>" type="text" value="<?php echo esc_attr($instance['facebook_id']); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:','tfuse'); ?></label><br/>
        <span><?php _e('Link:','tfuse'); ?></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo  esc_attr($instance['twitter']); ?>"  />
        <span><?php _e('Name:','tfuse'); ?></span> <input class="widefat widget_social_name" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" type="text" value="<?php echo esc_attr($instance['twitter_id']); ?>"  />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Dribble:','tfuse'); ?></label><br/>
        <span><?php _e('Link:','tfuse'); ?></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" type="text" value="<?php echo esc_attr($instance['dribbble']); ?>" />
        <span><?php _e('Name:','tfuse'); ?></span> <input class="widefat widget_social_name" id="<?php echo $this->get_field_id('dribbble_id'); ?>" name="<?php echo $this->get_field_name('dribbble_id'); ?>" type="text" value="<?php echo esc_attr($instance['dribbble_id']); ?>"  />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr:','tfuse'); ?></label><br/>
       <span><?php _e('Link:','tfuse'); ?></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo esc_attr($instance['flickr']); ?>" />
       <span><?php _e('Name:','tfuse'); ?></span> <input class="widefat widget_social_name" id="<?php echo $this->get_field_id('flickr_id'); ?>" name="<?php echo $this->get_field_name('flickr_id'); ?>" type="text" value="<?php echo esc_attr($instance['flickr_id']); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('deviantart'); ?>"><?php _e('Deviantart:','tfuse'); ?></label><br/>
        <span><?php _e('Link:','tfuse'); ?></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('deviantart'); ?>" name="<?php echo $this->get_field_name('deviantart'); ?>" type="text" value="<?php echo esc_attr($instance['deviantart']); ?>"/>
        <span><?php _e('Name:','tfuse'); ?></span> <input class="widefat widget_social_name" id="<?php echo $this->get_field_id('deviantart_id'); ?>" name="<?php echo $this->get_field_name('deviantart_id'); ?>" type="text" value="<?php echo esc_attr($instance['deviantart_id']); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('Rss:','tfuse'); ?></label><br/>
        <span><?php _e('Link:','tfuse'); ?></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo esc_attr($instance['rss']); ?>"  />
        <span><?php _e('Name:','tfuse'); ?></span> <input class="widefat widget_social_name" id="<?php echo $this->get_field_id('rss_id'); ?>" name="<?php echo $this->get_field_name('rss_id'); ?>" type="text" value="<?php echo  esc_attr($instance['rss_id']); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('Linkedin:','tfuse'); ?></label><br/>
        <span><?php _e('Link:','tfuse'); ?></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($instance['linkedin']); ?>"  />
        <span><?php _e('Name:','tfuse'); ?></span> <input class="widefat widget_social_name" id="<?php echo $this->get_field_id('linkedin_id'); ?>" name="<?php echo $this->get_field_name('linkedin_id'); ?>" type="text" value="<?php echo  esc_attr($instance['linkedin_id']); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('Skype: ID','tfuse'); ?></label>
        <input class="widefat widget_social_link tfuse_wd_skype" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo esc_attr($instance['skype']); ?>"  />
    </p>

    <?php
	}
}

function TFuse_Unregister_WP_Widget_Social() {
	unregister_widget('WP_Widget_Social');
}
add_action('widgets_init','TFuse_Unregister_WP_Widget_Social');

register_widget('TF_Widget_Social');
