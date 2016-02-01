<?php
if ( ! isset( $content_width ) ) $content_width = 900;

if (!function_exists('tfuse_browser_body_class')):

/* This Function Add the classes of body_class()  Function
 * To override tfuse_browser_body_class() in a child theme, add your own tfuse_count_post_visits()
 * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
*/

    add_filter('body_class', 'tfuse_browser_body_class');

    function tfuse_browser_body_class() {

        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

        if ($is_lynx)
            $classes[] = 'lynx';
        elseif ($is_gecko)
            $classes[] = 'gecko';
        elseif ($is_opera)
            $classes[] = 'opera';
        elseif ($is_NS4)
            $classes[] = 'ns4';
        elseif ($is_safari)
            $classes[] = 'safari';
        elseif ($is_chrome)
            $classes[] = 'chrome';
        elseif ($is_IE) {
            $browser = $_SERVER['HTTP_USER_AGENT'];
            $browser = substr("$browser", 25, 8);
            if ($browser == "MSIE 7.0")
                $classes[] = 'ie7';
            elseif ($browser == "MSIE 6.0")
                $classes[] = 'ie6';
            elseif ($browser == "MSIE 8.0")
                $classes[] = 'ie8';
            else
                $classes[] = 'ie';
        }
        else
            $classes[] = 'unknown';

        if ($is_iphone)
            $classes[] = 'iphone';

        return $classes;
    } // End function tfuse_browser_body_class()
endif;


if (!function_exists('tfuse_class')) :
/* This Function Add the classes for middle container
 * To override tfuse_class() in a child theme, add your own tfuse_count_post_visits()
 * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
*/

    function tfuse_class($param, $return = false) {
        $tfuse_class = '';
        $sidebar_position = tfuse_sidebar_position();
        if ($param == 'middle') {
            if (is_page_template('template-contact.php')) {
                if ($sidebar_position == 'left')
                    $tfuse_class = ' class="middle sidebarLeft nobg"';
                elseif ($sidebar_position == 'right')
                    $tfuse_class = ' class="middle sidebarRight nobg"';
                else
                    $tfuse_class = ' class="middle"';
            }
            else {
                if ($sidebar_position == 'left')
                    $tfuse_class = ' class="middle sidebarLeft"';
                elseif ($sidebar_position == 'right')
                    $tfuse_class = ' class="middle sidebarRight"';
                else
                    $tfuse_class = ' class="middle"';
            }
        }
        elseif ($param == 'content') {
            $tfuse_class = ( isset($sidebar_position) && $sidebar_position != 'full' ) ? ' class="grid_8 content"' : ' class="content"';
        }

        if ($return)
            return $tfuse_class;
        else
            echo $tfuse_class;
    }
endif;


if (!function_exists('tfuse_sidebar_position')):
/* This Function Set sidebar position
 * To override tfuse_sidebar_position() in a child theme, add your own tfuse_count_post_visits()
 * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
*/
    function tfuse_sidebar_position() {
        global $TFUSE;

        $sidebar_position = $TFUSE->ext->sidebars->current_position;
        if ( empty($sidebar_position) ) $sidebar_position = 'full';

        return $sidebar_position;
    }

// End function tfuse_sidebar_position()
endif;


if (!function_exists('tfuse_count_post_visits')) :
/**
 * tfuse_count_post_visits.
 * 
 * To override tfuse_count_post_visits() in a child theme, add your own tfuse_count_post_visits() 
 * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
 */

    function tfuse_count_post_visits()
    {
        if ( !is_single() ) return;

        global $post;

        $views = get_post_meta($post->ID, TF_THEME_PREFIX . '_post_viewed', true);
        $views = intval($views);
        tf_update_post_meta( $post->ID, TF_THEME_PREFIX . '_post_viewed', ++$views);
    }


// End function tfuse_count_post_visits()
endif;


if (!function_exists('tfuse_custom_title')):

    function tfuse_custom_title() {
        global $post,$front_page;
        $tfuse_title_type = tfuse_page_options('page_title');

        if ($tfuse_title_type == 'hide_title')
            $title = '';
        elseif ($tfuse_title_type == 'custom_title')
            $title = tfuse_page_options('custom_title');
        elseif ( $front_page )
        {
            $page_id = $post->ID;
            $title = get_the_title($page_id);
        }
        else
            $title = get_the_title();

        echo ( $title ) ? '<h1>' . $title . '</h1>' : '';
    }

endif;

if (!function_exists('tfuse_archive_custom_title')):
/**
 *  Set the name of post archive.
 *
 * To override tfuse_archive_custom_title() in a child theme, add your own tfuse_count_post_visits()
 * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
 */

    function tfuse_archive_custom_title()
    {
        $cat_ID = 0;
        if ( is_category() )
        {
            $cat_ID = get_query_var('cat');
            $title = single_term_title( '', false );
        }
        elseif ( is_tax() )
        {
            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $cat_ID = $term->term_id;
            $title = single_term_title( $term->name , false );
        }
        elseif ( is_post_type_archive() )
        {
            $title = post_type_archive_title('',false);
        }

        $tfuse_title_type = tfuse_options('page_title',null,$cat_ID);

        if ($tfuse_title_type == 'hide_title')
            $title = '';
        elseif ($tfuse_title_type == 'custom_title')
            $title = tfuse_options('custom_title',null,$cat_ID);

        echo !empty($title) ? '<h1>' . $title . '</h1>' : '';
    }

endif;



if (!function_exists('tfuse_user_profile')) :
/**
 * Retrieve the requested data of the author of the current post.
 *  
 * @param array $fields first_name,last_name,email,url,aim,yim,jabber,facebook,twitter etc.
 * @return null|array The author's spefified fields from the current author's DB object.
 */
    function tfuse_user_profile( $fields = array() )
    {
        $tfuse_meta = null;

        // Get stnadard user contact info
        $standard_meta = array(
            'first_name' => get_the_author_meta('first_name'),
            'last_name' => get_the_author_meta('last_name'),
            'email'     => get_the_author_meta('email'),
            'url'       => get_the_author_meta('url'),
            'aim'       => get_the_author_meta('aim'),
            'yim'       => get_the_author_meta('yim'),
            'jabber'    => get_the_author_meta('jabber')
        );

        // Get extended user info if exists
        $custom_meta = (array) get_the_author_meta('theme_fuse_extends_user_options');

        $_meta = array_merge($standard_meta,$custom_meta);

        foreach ($_meta as $key => $item) {
            if ( !empty($item) && in_array($key, $fields) ) $tfuse_meta[$key] = $item;
        }

        return apply_filters('tfuse_user_profile', $tfuse_meta, $fields);
    }

endif;


if (!function_exists('tfuse_action_comments')) :
/**
 *  This function disable post commetns.
 *
 * To override tfuse_action_comments() in a child theme, add your own tfuse_count_post_visits()
 * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
 */

    function tfuse_action_comments() {
        global $post;
        if (!tfuse_page_options('disable_comments'))
            comments_template( '', true );
    }

    add_action('tfuse_comments', 'tfuse_action_comments');
endif;


if (!function_exists('tfuse_get_comments')):
/**
 *  Get post comments for a specific post.
 *
 * To override tfuse_get_comments() in a child theme, add your own tfuse_count_post_visits()
 * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
 */

    function tfuse_get_comments($return = TRUE, $post_ID) {
        $num_comments = get_comments_number($post_ID);

        if (comments_open($post_ID)) {
            if ($num_comments == 0) {
                $comments = __('No Comments','tfuse');
            } elseif ($num_comments > 1) {
                $comments = $num_comments . __(' Comments','tfuse');
            } else {
                $comments = "1 Comment";
            }
            $write_comments = '<a class="link-comments" href="' . get_comments_link() . '">' . $comments . '</a>';
        } else {
            $write_comments = __('Comments are off','tfuse');
        }
        if ($return)
            return $write_comments;
        else
            echo $write_comments;
    }

endif;


if (!function_exists('tfuse_pagination')) :
/**
 * Display pagination to next/previous pages when applicable.
 * 
 * To override tfuse_pagination() in a child theme, add your own tfuse_pagination() 
 * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
 */
    function tfuse_pagination() {
        global $wp_query;

        if ( $wp_query->max_num_pages > 1 ) : ?>
            <div class="other_posts">
                <span class="nextp"><?php next_posts_link(__('Next page', 'tfuse')); ?></span>
                <span class="prevp"><?php previous_posts_link(__('Prev page', 'tfuse')); ?></span>
            </div>
	<?php endif;
}
endif; // tfuse_pagination


if (!function_exists('tfuse_shortcode_content')) :
/**
 *  Get post comments for a specific post.
 *
 * To override tfuse_shortcode_content() in a child theme, add your own tfuse_count_post_visits()
 * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
 */

    function tfuse_shortcode_content($position = '', $return = false)
    {
        $page_shortcodes = '';
        global $is_tf_front_page,$is_tf_blog_page,$post;
        $position = ( $position == 'before' ) ? 'content_top' : 'content_bottom';
        if ($is_tf_blog_page) {
            $page_shortcodes = tfuse_options($position);
        }
        elseif ($is_tf_front_page) {
            if(tfuse_options('use_page_options') && tfuse_options('homepage_category')=='page'){
                $page_id = $post->ID;
                $page_shortcodes = tfuse_page_options($position,'',$page_id);
            }
            else
                $page_shortcodes = tfuse_options($position);
        }
        elseif (is_singular()) {
            global $post;
            $page_shortcodes = tfuse_page_options($position);
        } elseif (is_category()) {
            $cat_ID = get_query_var('cat');
            $page_shortcodes = tfuse_options($position, '', $cat_ID);
        } elseif (is_tax()) {
            $taxonomy = get_query_var('taxonomy');
            $term = get_term_by('slug', get_query_var('term'), $taxonomy);
            $cat_ID = $term->term_id;
            $page_shortcodes = tfuse_options($position, '', $cat_ID);
        }

        $page_shortcodes = tfuse_qtranslate($page_shortcodes);

        $page_shortcodes = apply_filters('themefuse_shortcodes', $page_shortcodes);

        if ($return)
            return $page_shortcodes; else
            echo $page_shortcodes;
    }

// End function tfuse_shortcode_content()
endif;


if (!function_exists('tfuse_category_on_front_page')) :
    /**
     * Dsiplay homepage category
     *
     * To override tfuse_category_on_front_page() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
     */

    function tfuse_category_on_front_page()
    {
        if ( !is_front_page() ) return;

        global $is_tf_front_page,$homepage_categ;
        $is_tf_front_page = false;

        $homepage_category = tfuse_options('homepage_category');
        $homepage_category = explode(",",$homepage_category);
        foreach($homepage_category as $homepage)
        {
            $homepage_categ = $homepage;
        }

        if($homepage_categ == 'specific')
        {
            $is_tf_front_page = true;
            $archive = 'archive.php';
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $specific = tfuse_options('categories_select_categ');

            $items = get_option('posts_per_page');
            $ids = explode(",",$specific);
            $posts = array(); $num_post = 0;
            foreach ($ids as $id){
                $posts[] = get_posts(array('category' => $id));
            }
            foreach($posts as $post)
            {
                $num_posts = count($post);
                $num_post += $num_posts;
            }
            $max = $num_post/$items;
            if($num_posts%$items) $max++;

            $args = array(
                'cat' => $specific,
                'orderby' => 'date',
                'paged' => $paged
            );
            query_posts($args);


            wp_localize_script(
                'tf-load-posts',
                'nr_posts',
                array(
                    'max' => $max
                )
            );

            include_once(locate_template($archive));

            return;
        }
        elseif($homepage_categ == 'page')
        {
            global $front_page;
            $is_tf_front_page = true;
            $front_page = true;
            $archive = 'page.php';
            $page_id = tfuse_options('home_page');

            $args=array(
                'page_id' => $page_id,
                'post_type' => 'page',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'ignore_sticky_posts'=> 1
            );
            query_posts($args);
            include_once(locate_template($archive));
            wp_reset_query();
            return;
        }
        elseif($homepage_categ == 'all')
        {
            $archive = 'archive.php';

            $is_tf_front_page = true;
            wp_reset_postdata();
            include_once(locate_template($archive));
            return;
        }

    }

// End function tfuse_category_on_front_page()
endif;

if (!function_exists('tfuse_category_on_blog_page')) :
    /**
     * Dsiplay blogpage category
     *
     * To override tfuse_category_on_blog_page() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
     */

    function tfuse_category_on_blog_page()
    {
        global $is_tf_blog_page,$blogpage_categ;
        if ( !$is_tf_blog_page ) return;
        $is_tf_blog_page = false;

        $blogpage_category = tfuse_options('blogpage_category');
        $blogpage_category = explode(",",$blogpage_category);
        foreach($blogpage_category as $blogpage)
        {
            $blogpage_categ = $blogpage;
        }

        if($blogpage_categ == 'specific')
        {
            $is_tf_blog_page = true;
            $archive = 'archive.php';
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $specific = tfuse_options('categories_select_categ_blog');

            $items = get_option('posts_per_page');
            $ids = explode(",",$specific);
            $posts = array(); $num_post = 0;
            foreach ($ids as $id){
                $posts[] = get_posts(array('category' => $id));
            }
            foreach($posts as $post)
            {
                $num_posts = count($post);
                $num_post += $num_posts;
            }
            $max = $num_post/$items;
            if($num_posts%$items) $max++;

            $args = array(
                'cat' => $specific,
                'orderby' => 'date',
                'paged' => $paged
            );
            query_posts($args);
            wp_localize_script(
                'tf-load-posts',
                'nr_posts',
                array(
                    'max' => $max
                )
            );
            include_once(locate_template($archive));
            return;
        }
        elseif($blogpage_categ == 'all')
        {
            $is_tf_blog_page = true;
            $archive = 'archive.php';
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $categories = get_categories();

            $ids = array();
            foreach($categories as $cats){
                $ids[] = $cats -> term_id;
            }
            $items = get_option('posts_per_page');
            $posts = array(); $num_post = 0;

            foreach ($ids as $id){
                $posts[] = get_posts(array('category' => $id));
            }
            foreach($posts as $post)
            {
                $num_posts = count($post);
                $num_post += $num_posts;
            }
            $max = $num_post/$items;
            if($num_posts%$items) $max++;

            $args = array(
                'orderby' => 'date',
                'paged' => $paged
            );
            query_posts($args);
            wp_localize_script(
                'tf-load-posts',
                'nr_posts',
                array(
                    'max' => $max
                )
            );
            include_once(locate_template($archive));
            return;
        }
    }
// End function tfuse_category_on_blog_page()
endif;


if (!function_exists('tfuse_action_footer')) :
/**
 * Dsiplay footer content
 *
 * To override tfuse_action_footer() in a child theme, add your own tfuse_count_post_visits()
 * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
 */

    function tfuse_action_footer() {
        if ( !tfuse_options('enable_footer_shortcodes') ) {
            ?>
            <div class="grid_2">
                <?php dynamic_sidebar('footer-1'); ?>
            </div><!-- /.grid_2 -->

            <div class="grid_2">
                <?php dynamic_sidebar('footer-2'); ?>
            </div><!-- /.grid_2 -->

            <div class="grid_2">
                <?php dynamic_sidebar('footer-3'); ?>
            </div><!-- /.grid_2 -->

            <div class="grid_2">
                <?php dynamic_sidebar('footer-4'); ?>
            </div><!-- /.grid_2 -->

            <div class="grid_4">
                <?php dynamic_sidebar('footer-5'); ?>
            </div><!-- /.grid_4 -->
            <?php
        } else {
            $footer_shortcodes = tfuse_options('footer_shortcodes');
            echo $page_shortcodes = apply_filters('themefuse_shortcodes', $footer_shortcodes);
        }
    }

    add_action('tfuse_footer', 'tfuse_action_footer');
endif;

if ( !function_exists('tfuse_img_content')):

    function tfuse_img_content(){ 
        $content = $link = '';
		$args = array(
			'numberposts'     => -1,
		); 
        $posts_array = get_posts( $args );
        $option_name = 'thumbnail_image';
		foreach($posts_array as $post):
			$featured = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID));  
			if(tfuse_page_options('thumbnail_image',false,$post->ID)) continue;
			
			if(!empty($featured))
			{
				$value = $featured[0];
				tfuse_set_page_option($option_name, $value, $post->ID);
				tfuse_set_page_option('disable_image', true , $post->ID); 
			}
			else
			{
				$args = array(
				 'post_type' => 'attachment',
				 'numberposts' => -1,
				 'post_parent' => $post->ID
				); 
				$attachments = get_posts($args);
				if ($attachments) {
				 foreach ($attachments as $attachment) { 
								$value = $attachment->guid; 
								tfuse_set_page_option($option_name, $value, $post->ID);
								tfuse_set_page_option('disable_image', true , $post->ID); 
							 }
				}
				else
				{
					$content = $post->post_content;
						if(!empty($content))
						{   
							preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $content,$matches);
							if(!empty($matches))
							{
								$link = $matches[1]; 
								tfuse_set_page_option($option_name, $link , $post->ID);
								tfuse_set_page_option('disable_image', true , $post->ID);
							}
						}
				}
			}
                        
		endforeach;
			tfuse_set_option('enable_content_img',false, $cat_id = NULL);
    }
endif;

if ( tfuse_options('enable_content_img'))
{ 
    add_action('tfuse_head','tfuse_img_content');
}

function tfuse_set_blog_page(){
    global $wp_query,$is_tf_blog_page;
    if(isset($wp_query->queried_object->ID)) $id_post = $wp_query->queried_object->ID;
    elseif(isset($wp_query->query['page_id'])) $id_post = $wp_query->query['page_id'];
    else $id_post = 0;
    if(tfuse_options('blog_page') != 0 && $id_post == tfuse_options('blog_page')) $is_tf_blog_page = true;
}
add_action('wp_head','tfuse_set_blog_page');

if(!function_exists('tfuse_update_reservation_forms'))
{
    function tfuse_update_reservation_forms()
    {
        $forms = get_terms( 'reservations', array(
            'orderby'    => 'count',
            'hide_empty' => 0
        ) );

        $args = array(
            '0' =>  'text',
            '1' =>  'textarea',
            '2' =>  'radio',
            '3' =>  'checkbox',
            '4' =>  'select',
            '5' =>  'email',
            '6' =>  'captcha',
            '7' =>  'date_in',
            '8' =>  'date_out',
            '9' =>  'res_email',
        );

        foreach($forms as $form)
        {
            $check_option = get_option( 'tfuse_update_reservation_forms', 'none' );
            if($check_option == 'set')
            {
                return;
            }
            $description = unserialize($form->description);
            if(isset($description['version']) AND $description['version'] == '1.1')
                continue;

            foreach($description['input'] as $key => $input)
            {
                if(isset($args[$input['type']]))
                    $input['type'] = $args[$input['type']];
                $description['input'][$key]['type'] = $input['type'];
            }
            $description['version'] = '1.1';
            wp_update_term($form->term_id, 'reservations', array('description' => serialize($description)));
            add_option('tfuse_update_reservation_forms', 'set');
        }
    }
    add_action('wp_head', 'tfuse_update_reservation_forms');
}