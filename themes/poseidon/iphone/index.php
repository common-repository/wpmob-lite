<?php get_header(); ?>	

	<?php while ( wpmob_have_posts() ) { ?>

		<?php wpmob_the_post(); ?>
         
          <!-- BEGIN POST -->
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
            <div class="hr"></div>
          </div>
          <!-- END POST -->
	<?php } ?>

		<?php if ( wpmob_has_next_posts_link() ) { ?>
				<div class="posts-nav post rounded-corners-8px">
					<div class="left"><?php previous_posts_link( __( "Back", "wpmob-lite" ) ) ?></div>
					<div class="right clearfix"><?php next_posts_link( __( "Next", "wpmob-lite" ) ) ?></div>
				</div>
		<?php } ?>   
      <!-- BEGIN FLICKR -->
      <?php if(wpmob_get_flickr_id()){?>
      <div class="hr bold"></div>
      
      <div id="flickr">
        <img src="<?php echo wpmob_get_bloginfo('template_directory');?>/images/flickr.png" alt="Flickr" class="logo" />
      </div>
      <script type="text/javascript" src="http://api.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&api_key=<?php wpmob_flickr_api();?>&format=json&jsoncallback=flickrCallback&user_id=<?php wpmob_flickr_id();?>@N08&per_page=6"></script>
      <!-- END FLICKR -->

      <?php }?>

     <!-- BEGIN SOCIAL MEDIA -->
     <?php
        if(wpmob_get_social_network()){
    ?>
      <div class="hr bold"></div>
      <ul id="social-media">
        <?php if(wpmob_get_feed_burner_link()){?>
        <li>
          <a href="<?php wpmob_get_feed_burner_link();?>" title="RSS"><img src="<?php echo wpmob_get_bloginfo('template_directory'); ?>/images/socialmedia/rss.png" alt="" /></a>
        </li>
        <?php }?>
        <?php if(wpmob_get_twitter()){?>
        <li>
          <a href="<?php wpmob_twitter();?>" title="Follow me!"><img src="<?php echo wpmob_get_bloginfo('template_directory'); ?>/images/socialmedia/twitter.png" alt="" /></a>
        </li>
        <?php }?>
        <?php if(wpmob_get_facebook()){?>
        <li>
          <a href="<?php wpmob_facebook();?>" title="Blog Tool and Publishing Platform"><img src="<?php echo wpmob_get_bloginfo('template_directory'); ?>/images/socialmedia/facebook.png" alt="" /></a>
        </li>
        <?php }?>
        <?php if(wpmob_get_youtube_link()){?>
        <li>
          <a href="<?php wpmob_youtube_link();?>" title="Blog Tool and Publishing Platform"><img src="<?php echo wpmob_get_bloginfo('template_directory'); ?>/images/socialmedia/youtube.png" alt="" /></a>
        </li>
        <?php }?>
        <?php if(wpmob_get_linked_in_link()){?>
        <li>
          <a href="<?php wpmob_linked_in_link();?>" title="Blog Tool and Publishing Platform"><img src="<?php echo wpmob_get_bloginfo('template_directory'); ?>/images/socialmedia/linkedin.png" alt="" /></a>
        </li>
        <?php }?>
      </ul>
      <?php
        }
        ?>
      <!-- END SOCIAL MEDIA -->

      <?php get_footer(); ?>