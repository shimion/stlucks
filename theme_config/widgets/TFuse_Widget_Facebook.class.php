<?php
/**
 * Facebook Widget
 * 
 * @author ThemeFuse
 * @since 1.0
*/

class TFuse_facebook extends WP_Widget
{

    function TFuse_facebook() {
        $widget_ops = array('description' => '' );
        parent::WP_Widget(false, __('TFuse - Facebook', 'tfuse'),$widget_ops);
    }

    function widget($args, $instance) {
        extract( $args );
        $facebook_id = $instance['facebook_id'];

        echo '<div id="facebook-'.$args['widget_id'].'" class="widget-container widget_facebook">'.$facebook_id .'</div>';
    }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

    function form($instance) {
        $instance = wp_parse_args( (array) $instance, array( 'facebook_id' => '') );
        $facebook_id = $instance['facebook_id'];
        ?>
    <p>
        <label for="<?php echo $this->get_field_id('facebook_id'); ?>"><?php _e('Facebook Social Plugins:','tfuse'); ?> (<a href="http://developers.facebook.com/docs/plugins/">Social Plugins</a>):</label>
        <textarea name="<?php echo $this->get_field_name('facebook_id'); ?>" class="widefat" id="<?php echo $this->get_field_id('facebook_id'); ?>"><?php echo $facebook_id; ?></textarea>
    </p>
<?php
    }
}
register_widget('TFuse_facebook');
