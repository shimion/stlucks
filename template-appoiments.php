<?php
/*
Template Name: Appointment
*/

get_header(); 

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

            <div class="post-item">

            <?php tfuse_custom_title(); ?>

            <div class="entry">

                <?php  while (have_posts()) : the_post(); ?>

                    <?php the_content(); ?>

                    <?php get_template_part( 'content', 'appoiment' ); ?>

                <?php endwhile; ?>

                <?php tfuse_shortcode_content('after'); ?>

            </div><!--/ .entry -->

            </div><!--/ .post-item -->

        </div><!--/ .content -->

        <?php if ($sidebar_position == 'right') : ?>
            <div class="grid_4 sidebar">
                <?php get_sidebar(); ?>
            </div><!--/ .sidebar -->
        <?php endif; ?>

        <div class="clear"></div>

    </div><!--/ .container_12 -->

</div><!--/ .middle -->

<div class="middle_bot"></div>

<?php get_footer(); ?>