<?php
/*
Template Name: Services
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

                    <?php

                        if (have_posts()) : the_post();
                           the_content();
                        endif;

                        $bottom_content = tfuse_shortcode_content('after',true);

                        if ( get_query_var('paged') ) $paged = get_query_var('paged'); elseif ( get_query_var('page') ) $paged = get_query_var('page'); else $paged = 1;

                        $perpage = tfuse_options('services_per_page',6);

                        query_posts("post_type=services&posts_per_page=$perpage&paged=$paged");

                        if (have_posts()) : while (have_posts()) : the_post();

                        tfuse_media();

                    ?>

                        <h3 class="title_blue2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                        <?php if ( tfuse_options('post_content') == 'content' ) the_content(''); else the_excerpt(); ?>

                    <?php endwhile; else: ?>

                        <h5><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></h5>

                        <div class="divider_space"></div>

                    <?php endif; ?>

                    <div class="divider_space"></div>

                    <?php echo $bottom_content; ?>

                    <div class="clear"></div>

                    <?php tfuse_pagination(); ?>

                    <?php wp_reset_query(); ?>

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