<?php get_header(); ?>
<style>
.post-detail h1{ text-align:center !important;}
.post-meta{ display:none;}
.date-box{ display:none;}
</style>
<?php $sidebar_position = tfuse_sidebar_position(); ?>

<div <?php tfuse_class('middle'); ?>>

    <div class="container_12" style="background:#FFF;">

        <?php if ($sidebar_position == 'left') : ?>
            <div class="grid_4 sidebar">
                <?php get_sidebar(); ?>
            </div><!--/ .sidebar -->
        <?php endif; ?>

        <div class="grid_12">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php

                    if ( 'doctors' == get_post_type() ) :
                        get_template_part( 'content', 'doctor' );
                    elseif ( 'services' == get_post_type() ) :
                        get_template_part( 'content', 'services' );
                    else :
                        get_template_part( 'content', 'single' );
                        get_template_part( 'content', 'author' );
                    endif;

                ?>

                <div class="divider_dots"></div>

                <?php // tfuse_comments(); ?>

            <?php endwhile; // end of the loop. ?>

            <div class="clear"></div>
        </div><!--/ .content -->

       
        <div class="clear"></div>
    </div><!--/ .container_12 -->

</div><!--/ .middle -->

<div class="middle_bot"></div>

<?php get_footer(); ?>