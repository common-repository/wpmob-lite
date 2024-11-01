<?php global $wpmob_lite; ?>
<?php $settings = $wpmob_lite->get_settings(); ?>
<script type="text/javascript">
	var admob_vars = {
		pubid: '<?php echo $settings->admob_publisher_id;?>',
		ama: false<?php if ( $wpmob_lite->is_in_developer_mode() ) { ?>,
		test: true<?php } ?>
	};
</script>
<script type="text/javascript" src="http://mm.admob.com/static/iphone/iadmob.js"></script>