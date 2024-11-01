<?php get_header(); ?>	

		<?php while ( wpmob_have_posts() ) { ?>

		<?php wpmob_the_post(); ?>

		<div class="<?php wpmob_post_classes(); ?> rounded-corners-8px">

			<h2><?php wpmob_the_title(); ?></h2>

			<div class="date-author-wrap">
				<div class="<?php wpmob_date_classes(); ?>">
					<?php _e( "Published on", "wpmob-lite" ); ?> <?php wpmob_the_time( 'F jS, Y' ); ?>
				</div>			
				<div class="post-author">
					<?php _e( "Written by", "wpmob-lite" ); ?>: <?php the_author(); ?> 
				</div>
			</div>
		</div>	
		
		<div class="<?php wpmob_post_classes(); ?> rounded-corners-8px">

		<!-- text for 'back and 'next' is hidden via CSS, and replaced with arrow images -->
<!--			<div class="post-navigation nav-top">
				<div class="post-nav-fwd">
					<?php //wpmob_theme_get_next_post_link(); ?>
				</div>				
				<div class="post-nav-middle">
					<?php //if ( wpmob_get_comment_count() > 0 ) echo '<a href="#comments" class="middle-link no-ajax">' . __( "Skip to Responses", "wpmob-lite" ) . '</a>' ; ?>
				</div>
				<div class="post-nav-back">
					<?php //wpmob_theme_get_previous_post_link(); ?>
				</div>
			</div>-->
			
			<div class="<?php wpmob_content_classes(); ?>">
				<?php wpmob_the_content(); ?>

				<div class="single-post-meta-bottom">
					<?php wp_link_pages( 'before=<div class="post-page-nav">' . __( "Article Pages", "wpmob-lite" ) . ':&after=</div>&next_or_number=number&pagelink=page %&previouspagelink=&raquo;&nextpagelink=&laquo;');  ?>        
					<?php _e( "Categories", "wpmob-lite" ); ?>: <?php if ( the_category( ', ' ) ) the_category(); ?>
					<?php if ( function_exists( 'get_the_tags') ) the_tags( '<br />' . __( 'Tags', 'wpmob-lite' ) . ': ', ', ', ''); ?>  
				</div>   
			</div>
             <div class="hr"></div> 
              <div class="post-pagination">
                <div class="post-nav-fwd">
                    <?php wpmob_theme_get_next_post_link(); ?>
                </div>    
                <div class="button-separator"></div>
                <div class="post-nav-back">
                    <?php wpmob_theme_get_previous_post_link(); ?>
                </div>
              </div>
             <div class="hr bold"></div>
		</div><!-- wpmob_posts_classes() -->

		<?php } // endwhile ?>

		<?php comments_template(); ?>

<?php get_footer(); ?>