<?php global $wpmob_lite; ?>
<?php 
	if ( WPMOB_LITE_BETA ) {
		$forum_posts = $wpmob_lite->bnc_api->get_support_posts( 5, true ); 
	} else {
		$forum_posts = $wpmob_lite->bnc_api->get_support_posts( 5 ); 
	}
?>
<ul>
<?php if ( $forum_posts ) { ?>
	<?php foreach ( $forum_posts as $forum_posting ) { ?>
    <li>
        <a href="http://www.juicegraphic.com/support/topic/<?php echo $forum_posting->topic_slug; ?>" target="_blank"><?php echo $forum_posting->topic_title; ?></a> <?php echo sprintf( __( 'by %s', 'wpmob-lite' ), '<em>' . htmlentities( $forum_posting->topic_poster_name ), ENT_COMPAT, "UTF-8" ) . '</em>'; ?>
    </li>
    <?php } ?>
<?php } else { ?>
	<li class="no-listings"><?php _e( "The juicegraphic Forums timed out.", "wpmob-lite" ); ?></li>
<?php } ?>
</ul>