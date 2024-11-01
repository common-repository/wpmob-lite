	<!-- The tab Icon Bar -->
<!--    <div id="tab-bar">-->
<!--        <div id="tab-inner-wrap-left">-->
            <div id="navigation">
            <a title="Navigate" id="navigate" class="button normal"> 
              <span class="before"></span>
              Navigate <img src="<?php wpmob_skin_url(); ?>/down.png" alt="" />
              <span class="after"></span>
            </a>
            <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
             <div class="button normal search"> 
                <span class="before"></span> 
                <input type="text" name="s" id="s" tabindex="1" />
                <input type="submit" name="submit" value="" id="searchsubmit"  tabindex="2" />
                <span class="after"></span> 
              </div>
            </form>        
          </div>       
<!--      </div>-->
<!--	</div>-->
	
	<div id="menu">
			<!-- The WPmob Page Menu -->		
			<?php wpmob_show_menu(); ?>
	</div><!-- #tab-bar -->