<?php
/**
 * The template for displaying posts on archive pages.
 * To override this template in a child theme, copy this file 
 * to your child theme's folder.
 *
 * @since Medica 1.0
 */
  global $more;
    $more = apply_filters('tfuse_more_tag',0);
?>

    <div class="post-item">

        <div class="date-box"><?php echo get_the_date('M j'); ?></div>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <div class="entry">
            <?php 
                /*
                 * Display pagination to next/previous pages when applicable.
                 * This function is located in theme_config/theme_includes/TFUSE_MEDIA.php 
                 * Create your own tfuse_media() to override in a child theme.
                 * 
                 * @since Medica 1.0
                 */
                tfuse_media();
            ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (tfuse_options('post_content') == 'content' ) the_content(''); else the_excerpt(); ?>
			</div>
            <div class="clear"></div>
        </div>

        <div class="post-meta">
            <div class="alignleft"><a href="<?php the_permalink(); ?>" class="link-more"><?php _e('Read more', 'tfuse'); ?></a></div>
            <em><?php _e('by ', 'tfuse'); ?><span class="author"><?php the_author_posts_link() ?></span>
            <span class="separator">|</span>
            <a href="<?php comments_link(); ?>" class="link-comments"><?php comments_number("0 ".__('comments','tfuse'), "1 ".__('comment','tfuse'), "% ".__('comments','tfuse')); ?></a>
            </em>
        </div>

    </div><!--/ .post-item -->
