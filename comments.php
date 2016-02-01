<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to tfuse_comment() which is
 * located in the functions.php file.
 *
 */
?>

    <div id="comments" class="comment-list">
    <?php if ( post_password_required() ) : ?>
        <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'tfuse' ); ?></p>
    </div><!-- #comments -->
    <?php
            /* Stop the rest of comments.php from being processed,
             * but don't kill the script entirely -- we still have
             * to fully load the template.
             */
            return;
        endif;
    ?>

    <?php // You can start editing here -- including this comment! ?>

    <?php if ( have_comments() ) : ?>
        <h2 id="comments-title"><?php _e('Comments', 'tfuse') ?> (<?php comments_number('0', '1', '%') ?>)</h2>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-above">
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'tfuse' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'tfuse' ) ); ?></div>
        </nav>
        <?php endif; // check for comment navigation ?> 

        <a href="#respond" class="link-addcomment alignright"><?php _e('Add a comment', 'tfuse') ?></a>

        <ol class="commentlist">
            <?php
                /* Loop through and list the comments. Tell wp_list_comments()
                 * to use tfuse_comment() to format the comments.
                 * If you want to overload this in a child theme then you can
                 * copy file comments-template.php to child theme or
                 * define your own tfuse_comment() and that will be used instead.
                 * See tfuse_comment() in comments-template.php for more.
                 */
                get_template_part( 'comments', 'template' );
                wp_list_comments( array( 'callback' => 'tfuse_comment' ) );
            ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-below">
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'tfuse' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'tfuse' ) ); ?></div>
        </nav>
        <?php endif; // check for comment navigation ?>

    <?php elseif ( comments_open() ) : // If comments are open, but there are no comments ?>

        <p class="nocomments"><?php _e('No comments yet.', 'tfuse') ?></p>

    <?php endif; ?>

        <?php

            $req = get_option( 'require_name_email' );
            $aria_req = ( $req ? " aria-required='true'" : '' );
            $fields =  array(
                'author' => '<div class="row alignleft"><label for="author">' . __( 'Name','tfuse' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
                            '<input id="author" name="author" class="inputtext input_middle required" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
                'email'  => '<div class="row alignleft"><label for="email">' . __( 'Email','tfuse' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
                            '<input id="email" name="email" class="inputtext input_middle required" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>'.
                            '<div class="clear"></div>'
            );
            $args = array(
                'fields'               => $fields,
                'comment_field'        => '<div class="row"><label for="comment">' . __( 'Message', 'tfuse' ) . '</label><textarea id="comment" class="textarea textarea_middle required" name="comment" cols="30" rows="10" aria-required="true"></textarea></div><div class="clear"></div>',
                'comment_notes_before' => '',
                'comment_notes_after'  => '',
                'title_reply'          => __( 'Add a comment', 'tfuse' ),
                'title_reply_to'       => __( 'Leave a Reply to %s', 'tfuse' ),
                'cancel_reply_link'    => __( 'Cancel reply', 'tfuse' ),
                'label_submit'         => __( 'Submit', 'tfuse' )
            );

            comment_form( $args );
        ?>

</div><!-- #comments -->
