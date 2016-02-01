<?php get_header(); ?>

<?php tfuse_category_on_front_page(); ?>

<?php
    global $is_tf_front_page;
    if(!$is_tf_front_page)include_once('archive.php');
?>

<?php get_footer(); ?>