<!-- Code for Using Post Thumbnails  -->
<div class="thumbnail-wrap">
	<?php if ( has_post_thumbnail() ) { ?>
		<img src="<?php wpmob_the_post_thumbnail(); ?>" class="attachment-post-thumbnail" alt="post-thumbnail" />
	<?php } else { ?>
		<img src="<?php echo wpmob_bloginfo( 'template_directory' ); ?>/images/default-thumbnail.png" class="attachment-post-thumbnail default-thumbnail" alt="post-thumbnail" />
	<?php } ?>
</div>