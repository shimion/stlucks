<?php get_header(); ?>



<?php $sidebar_position = tfuse_sidebar_position(); ?>



<div <?php tfuse_class('middle'); ?>>

    <div class="container_12" style="background:#FFF;">






        <div class="grid_12 content">
				<?php 
				if( is_tax() ) {
					global $wp_query;
					$term = $wp_query->get_queried_object();
					$taxonomy = $term->taxonomy;
					$id = $term->term_id;
					//echo $title;
					//print_r($term);
				}
				$children = get_term_children($id, $taxonomy); 
			//	print_r( $children);
				
				if( empty( $children ) ) {
				?>
                
                    <div class="row">
						<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
            <?php if (have_posts()) : $count = 0; ?>

                <?php while (have_posts()) : the_post(); $count++; ?>



                    <?php // get_template_part('listing', 'blog'); ?>

                    	<div class="col-md-3 cat_bg_border">
                        	<a href="<?php the_permalink(); ?>">
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); $url = $image['0'];
							$url_thumb = aq_resize( $url, 190, 190, true,true,true );
							
							 ?>
                            
                            <img src="<?php echo $url_thumb; ?>" />
                            </a>
                        	<h5><a href="<?php the_permalink(); ?>"><?php echo $term->name; ?></a></h5>
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
			
				}else{
			$h .= '<div class="row">';
			 foreach ( $children as $child ) {
				 $term = get_term_by( 'id', $child, $taxonomy );
				 $term_link = get_term_link( $term );
			 $h .= '<div class="col-md-3 cat_bg_border cat-br"><a href="'.esc_url( $term_link ).'"><img src="'.aq_resize( card_taxonomy_image_url( $term->term_id, NULL, TRUE ), 190, 190, true,true,true ).'" /></a><h5><a href="'.esc_url( $term_link ).'">'.$term->name.'</a></h5></div>';
				
			 }
			 $h .='</div>';
				
			echo $h;		
					}

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

