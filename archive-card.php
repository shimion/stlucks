<?php get_header(); ?>



<?php $sidebar_position = tfuse_sidebar_position(); ?>



<div <?php tfuse_class('middle'); ?>>

    <div class="container_12" style="background:#FFF;">






        <div class="grid_12 content">

                    <div class="row">

            <?php if (have_posts()) : $count = 0; ?>

                <?php while (have_posts()) : the_post(); $count++; ?>



                    <?php // get_template_part('listing', 'blog'); ?>

                    	<div class="col-md-3 cat_bg_border">
                        	<a href="<?php the_permalink(); ?>">
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); $url = $image['0']; ?>
                            <img src="<?php echo $url; ?>" />
                            </a>
                        	<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        </div>

                    <?php

                    global $wp_query;

                    if ($count < $wp_query->post_count)

                      //  echo '<div class="divider_dots"></div>';

                    ?>



            <?php endwhile; else: ?>



                <h5><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></h5>



            <?php endif; ?>

                    </div>

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






        <div class="clear"></div>



    </div><!--/ .container_12 -->



</div><!--/ .middle -->



<div class="middle_bot"></div>



<?php get_footer(); ?>

