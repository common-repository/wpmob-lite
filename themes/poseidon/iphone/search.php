<?php get_header(); ?>	

	<!-- This function figures out what type of archive it is and spits it out as the title in a div class="archive-text" -->
	<?php wpmob_theme_archive_text(); ?>

	<?php while ( wpmob_have_posts() ) { ?>

		<?php wpmob_the_post(); ?>

		  <div class="post">
            <?php if ( wpmob_get_comment_count() && wpmob_theme_use_calendar_icons() ) { ?> 
            <a href="post.html#comments" title="No Comments" class="comments">
                    <?php comments_number('0','1','%'); ?>
            </a>
            <?php } ?>
            <div class="meta">
            <?php the_author(); ?>
            <?php if ( wpmob_has_tags() ) { ?>
                   | <?php _e( "Tags", "wpmob-lite" ); ?>: <?php wpmob_the_tags(); ?>
            <?php } ?>
            <?php if ( wpmob_has_categories() ) { ?>
            | <?php _e( "Categories", "wpmob-lite" ); ?>: <?php wpmob_the_categories(); ?>
            <?php } ?>
            </div>
            <h2 class="title"><a href="<?php wpmob_the_permalink()?>" title="<?php wpmob_the_title(); ?>"><?php wpmob_the_title(); ?></a></h2>
            <p>
                <?php wpmob_the_excerpt(); ?>
                <a href="<?php wpmob_the_permalink()?>">Read more &raquo;</a>
            </p>
          </div>

	<?php } ?>

		<?php if ( wpmob_has_next_posts_link() ) { ?>
			<?php if ( !wpmob_theme_is_ajax_enabled() ) { ?>	
				<div class="posts-nav post rounded-corners-8px">
					<div class="left"><?php wpmob_theme_archive_navigation_back(); ?></div>
					<div class="right clearfix"><?php wpmob_theme_archive_navigation_next(); ?></div>
				</div>
			<?php } else { ?>
				<a class="load-more-link" href="#" rel="<?php echo get_next_posts_page_link(); ?>"><?php _e( "Load More Entries&hellip;", "wpmob-lite" ); ?></a>
			<?php } ?>
		<?php } ?>
	
<?php get_footer(); ?>