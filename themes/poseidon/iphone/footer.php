                       </div><!-- #content --> 
        <?php do_action( 'wpmob_body_bottom' ); ?>
        <?php do_action( 'wpmob_advertising_bottom' ); ?>
      <div class="hr bold"></div>
    <div style="text-align: center;">
            <?php if ( wpmob_show_switch_link() ) { ?>
                <div id="switch">
                    <?php _e( "Mobile Version", "wpmob-lite" ); ?> | <a href="<?php wpmob_the_mobile_switch_link(); ?>" class="no-ajax"><?php _e( "Switch To Desktop Version", "wpmob-lite" ); ?></a>
                </div>
            <?php } ?>
                    
            <div class="<?php wpmob_footer_classes(); ?>">
                <?php wpmob_footer(); ?>
            </div>
            <?php 
            ?>
      </div>
    </div>
    <!-- end div #wrapper -->
        <!-- <?php //echo WPMOB_VERSION; ?> --> 
       
  </body>
</html>



        