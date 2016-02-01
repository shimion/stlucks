<?php
/**
 * The template for displaying Search Results pages.
 *
 * @since Medica 2.0
 */

get_header();

$sidebar_position = tfuse_sidebar_position(); ?>

<div <?php tfuse_class('middle'); ?>>
    <div class="container_12">

        <?php if ($sidebar_position == 'left') : ?>
            <div class="grid_4 sidebar">
                <?php get_sidebar(); ?>
            </div><!--/ .sidebar -->
        <?php endif; ?>

        <div <?php tfuse_class('content'); ?>>

            <?php if (have_posts()) : $count = 0; ?>

            <h2><?php printf( __( 'Search Results for: %s', 'tfuse' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

                <?php while (have_posts()) : the_post(); $count++; ?>

                    <?php get_template_part('listing', 'blog'); ?>

                    <?php
                    global $wp_query;
                    if ($count < $wp_query->post_count)
                        echo '<div class="divider_dots"></div>';
                    ?>

            <?php endwhile; else: ?>

                <h5><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></h5>

            <?php endif; ?>

            <?php 
                /*
                 * Display pagination to next/previous pages when applicable.
                 * This function is located in theme_config/theme_includes/THEME_FUNCTIONS.php 
                 * Create your own tfuse_pagination() to override in a child theme.
                 * 
                 * @since Medica 1.0
                 */
                tfuse_pagination();
            ?>

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