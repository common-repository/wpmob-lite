<?php get_header(); ?>	

	<div class="<?php wpmob_post_classes(); ?> wpmob-custom-page page-title-area rounded-corners-8px">

		<?php if ( wpmob_page_has_icon() ) { ?>
				<img src="<?php wpmob_page_the_icon(); ?>" alt="<?php the_title(); ?>-page-icon" />
		<?php } ?>

		<h2><?php _e( 'Links', 'wpmob-lite' ); ?></h2>

	</div>	
		
	<ul>	
		<?php wp_list_bookmarks(); ?>
	</ul>
	
<?php get_footer(); ?>