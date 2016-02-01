<?php
/**
 * The template for displaying content in the single.php for doctor template.
 * To override this template in a child theme, copy this file 
 * to your child theme's folder.
 *
 * @since Medica 1.0
 */
?>

<div class="post-item post-detail">

    <h1><?php the_title(); ?></h1>

    <div class="entry">
        <?php tfuse_media(); ?>
        <?php the_content(); ?>
        <div class="clear"></div>
    </div><!--/ .entry -->

</div><!--/ .post-item post-detail -->
