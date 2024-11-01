<?php get_header(); ?>	

	<div class="<?php wpmob_post_classes(); ?> wpmob-custom-page page-title-area rounded-corners-8px">

		<?php if ( wpmob_page_has_icon() ) { ?>
				<img src="<?php wpmob_page_the_icon(); ?>" alt="<?php the_title(); ?>-page-icon" />
		<?php } ?>

		<h2><?php _e( 'Archives', 'wpmob-lite' ); ?></h2>

	</div>	
		
	<h2 class="wpmob-archives"><?php _e( 'Browse Last 15 Posts', 'wpmob-lite' ); ?></h2>
		<ul class="wpmob-archives">
			<?php wp_get_archives( 'type=postbypost&limit=15' ); ?>
		</ul>
				
	<h2 class="wpmob-archives"><?php _e( 'Browse Last 12 Months', 'wpmob-lite' ); ?></h2>
		<ul class="wpmob-archives">
			<?php wp_get_archives( 'type=monthly&limit=12' ); ?>
		</ul>
		
<?php get_footer(); ?>