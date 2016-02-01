<?php
/**
 * The template for displaying content in the single.php template.
 * To override this template in a child theme, copy this file 
 * to your child theme's folder.
 *
 * @since Medica 1.0
 */
?>

<div class="post-item post-detail">

    <?php if ( !tfuse_page_options('disable_published_date') ) : ?>
    <div class="date-box">
        <?php echo get_the_date('M j'); ?>
    </div>
    <?php endif; ?>

    <h1><?php the_title(); ?></h1>

    <div class="entry">
        <?php tfuse_media(); ?> 
        <?php the_content(); ?>
        <div class="clear"></div>
		<?php wp_link_pages();?>
    </div><!--/ .entry -->

    <?php if ( !tfuse_page_options('disable_post_meta') ) : ?>
    <div class="post-meta">
        <em><?php _e('by ','tfuse'); ?><span class="author"><?php the_author_posts_link() ?></span>
        <?php if ( !tfuse_page_options('disable_comments') ) : ?>
        <span class="separator">|</span>
        <a href="<?php comments_link(); ?>" class="link-comments"><?php comments_number("0 ".__('comments','tfuse'), "1 ".__('comment','tfuse'), "% ".__('comments','tfuse')); ?></a>
        <?php endif; ?>
        </em>
    </div>
	<?php $tag = get_the_tags(); if (!empty($tag)):?>
		<div class="tag_links"><?php _e('Tags: ','tfuse');?><?php the_tags( '', ', ', '' ); ?></div>
	<?php endif;?>
    <?php endif; ?>

</div><!--/ .post-item post-detail -->
