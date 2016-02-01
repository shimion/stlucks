<?php
class TF_Widget_Contact extends WP_Widget
{

    function TF_Widget_Contact()
    {
        $widget_ops = array('classname' => 'widget_contact', 'description' => __( 'Add Contact in Sidebar','tfuse') );
        $this->WP_Widget('contact', __('TFuse Contact Widgets','tfuse'), $widget_ops);
    }

    function widget( $args, $instance )
    {
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

        $before_widget = '<div class="widget-container widget_contact">';
        $after_widget = '</div>';
        $before_title = '<h3 class="widget-title">';
        $after_title = '</h3>';
        $tfuse_title = (!empty($title)) ? $before_title .tfuse_qtranslate($title) .$after_title : '';

        echo $before_widget;

        // echo widgets title
        echo $tfuse_title;
        echo '<div class="inner">';
        if ( $instance['phone'] != '')
        {
            echo '<div class="contact-phone">
                    <label>'.__('by phone:','tfuse').'
                    </label>'.tfuse_qtranslate($instance['phone']).'
                </div>';
        }
        if ( $instance['email'] != '')
        {
            echo '<div class="contact-mail">
                    <label>'.__('by email:','tfuse').'</label>
                    '.tfuse_qtranslate($instance['email']).'
                </div>';
        }
        if ( $instance['adress'] != '')
        {
            echo '<div class="contact-address">
                    <label>'.__('by address:','tfuse').'</label>
                    '.tfuse_qtranslate($instance['adress']).'
                </div>';
        }

        echo '</div>';
        echo $after_widget;
    }

    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $new_instance = wp_parse_args( (array) $new_instance, array( 'title'=>'', 'email' => '','adress' => '','phone' => '') );

        $instance['title']      = $new_instance['title'];
        $instance['phone']      = $new_instance['phone'];
        $instance['email']      = $new_instance['email'];
        $instance['adress']      = $new_instance['adress'];

        return $instance;
    }

    function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array( 'title'=>'', 'email' => '','adress' => '','phone' => '') );
        $title = $instance['title'];
?>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','tfuse'); ?></label><br/>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:','tfuse'); ?></label><br/>
       <input class="widefat " id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr($instance['phone']); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:','tfuse'); ?></label><br/>
        <input class="widefat " id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo  esc_attr($instance['email']); ?>"  />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('adress'); ?>"><?php _e('Address:','tfuse'); ?></label><br/>
        <input class="widefat " id="<?php echo $this->get_field_id('adress'); ?>" name="<?php echo $this->get_field_name('adress'); ?>" type="text" value="<?php echo esc_attr($instance['adress']); ?>" />
    </p>
    <?php
    }
}
register_widget('TF_Widget_Contact');
