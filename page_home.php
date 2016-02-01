<?php
/*
Template Name: Home
*/
global $is_tf_blog_page,$post,$is_tf_front_page;
get_header();
if ($is_tf_blog_page)die;
$sidebar_position = tfuse_sidebar_position();
?>
<div <?php tfuse_class('middle'); ?>>

    <div class="container_12">

        <?php if ($sidebar_position == 'left') : ?>
            <div class="grid_4 sidebar">
                <?php get_sidebar(); ?>
            </div><!--/ .sidebar -->
        <?php endif; ?>

        <div <?php tfuse_class('content'); ?>>

            <?php if ($sidebar_position != 'full')
                echo '<div class="post-item">'; ?>
            <?php wp_reset_postdata(); ?>
            <?php tfuse_custom_title(); ?>

            <div class="entry">

                <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                        <?php 
							tfuse_comments(); 
							break;
						?>
                <?php endwhile; // end of the loop. ?>

                <?php tfuse_shortcode_content('after'); ?>
                <div class="clear"></div>
            </div><!--/ .entry -->

            <?php if ($sidebar_position != 'full')
                echo '</div><!--/ .post-item -->'; ?>

        </div><!--/ .content -->

        <?php if ($sidebar_position == 'right') : ?>
            <div class="grid_4 sidebar">
                <?php get_sidebar(); ?>
            </div><!--/ .sidebar -->
        <?php endif; ?>

        <?php if ($sidebar_position != 'full')
            echo '<div class="clear"></div>'; ?>

    </div><!--/ .container_12 -->

</div><!--/ .middle -->

<div class="middle_bot"></div>

<?php get_footer(); ?>