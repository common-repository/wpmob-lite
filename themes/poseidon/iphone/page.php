<?php get_header(); ?>	

	<?php if ( wpmob_have_posts() ) { ?>
	
		<?php wpmob_the_post(); ?>
          <!-- BEGIN POST -->
          <div class="post">
            <a href="" title="No Comments" class="comments"><?php comments_number('0','1','%'); ?></a>
            <div class="meta"><?php wpmob_the_time( 'F jS, Y' ); ?> &bull; <a href="" title="View all posts in Articles">Articles</a></div>
            <h2 class="title"><a href="<?php get_permalink($post->ID)?>" title="<?php wpmob_the_title(); ?>"><?php wpmob_the_title(); ?></a></h2>
            <?php wp_link_pages( 'before=<div class="post-page-nav">' . __( "Pages", "wpmob-lite" ) . ':&after=</div>&next_or_number=number&pagelink=page %&previouspagelink=&raquo;&nextpagelink=&laquo;' ); ?>        
            <p>
                <?php wpmob_the_content(); ?>
                <?php wp_link_pages( __( 'Pages in the article:', 'wpmob-lite' ), '', 'number' ); ?>
            </p>
          </div>
          <!-- END POST -->
        <div class="hr"></div>

	<?php } ?>
	
	<?php if ( wpmob_theme_show_comments_on_pages() ) { ?>
		<?php comments_template(); ?>
	<?php } ?>
	
<?php get_footer(); ?>