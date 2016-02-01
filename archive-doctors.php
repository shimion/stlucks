<?php get_header(); ?>

<?php $sidebar_position = tfuse_sidebar_position(); ?>

<div <?php tfuse_class('middle'); ?>>

    <div class="container_12">

        <?php if ($sidebar_position == 'left') : ?>
            <div class="grid_4 sidebar">
                <?php get_sidebar(); ?>
            </div><!--/ .sidebar -->
        <?php endif; ?>

        <div <?php tfuse_class('content'); ?>>

            <div class="post-item">

                <?php tfuse_archive_custom_title(); ?>

                <div class="entry">

                <?php echo tfuse_shortcode_content('before'); ?>

                <?php if (have_posts()) : $count = 0; ?>

                    <?php while (have_posts()) : the_post(); $count++; ?>

                        <?php tfuse_media(); ?>

                        <h3 class="title_pink2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                        <?php if ( tfuse_options('post_content') == 'content' ) the_content(''); else the_excerpt(); ?>

                        <div class="divider_space_thin"></div>

                <?php endwhile; else: ?>

                    <h5><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></h5>

                    <div class="divider_space"></div>

                <?php endif; ?>

                <?php echo tfuse_shortcode_content('after'); ?>

                <div class="clear"></div>

                <?php tfuse_pagination(); ?>

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
