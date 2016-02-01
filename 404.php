<?php get_header(); ?>
<div class="header_bot header_text">
    <div class="container">
        <div class="title"><h1><?php _e('404 Error', 'tfuse') ?></h1></div>
    </div>
</div>
<div class="middle sidebarRight nobg">

    <div class="container_12">

        <div class="grid_8 content">
            <div class="post-item">
                <div class="entry">
                    <p><?php _e('Page not found', 'tfuse') ?></p>
                    <p><?php _e('The page you were looking for doesn&rsquo;t seem to exist', 'tfuse') ?>.</p>
                </div><!--/ .entry -->
            </div><!--/ .post-item -->
        </div><!--/ .content -->

        <div class="grid_4 sidebar">
            <?php get_sidebar(); ?>
        </div><!--/ .sidebar -->
        <div class="clear"></div>

    </div><!--/ .container_12 -->

</div><!--/ .middle -->
<div class="middle_bot"></div>
<?php get_footer(); ?>