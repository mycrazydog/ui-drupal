



        <header role="banner" id="unccedu-header">
          <div class="container">
            <div id="unccedu-header-watermark" class="row vertical-align">

              <div id="uncc-logo" class="col-sm-4 col-md-2">
              	<?php if ($logo): ?>
              	<a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              	  <img class="img-responsive" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
              	</a>
              	<?php endif; ?>
              </div> <!-- /#uncc-logo -->

              <div id="branding" class="col-sm-8 col-md-5">

						<?php if (!empty($site_name)): ?>
						<a class="site-title" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
						<?php endif; ?>


                      <p class="hidden-xs" id="subbrand-link">
                      	<?php if (!empty($subbrand_link)): ?>
                      	   <a href="<?php print $subbrand_link; ?>" title="<?php print $subbrand_text; ?>"><?php print $subbrand_text; ?></a>
                      	<?php endif; ?>
                      </p>


              </div>

              <div id="header-utility" class="col-md-5 hidden-xs">
                <ul id="header-utility-links">
                  <li><a href="/">Home</a></li>
                  <li><a href="/">Contact Us</a></li>
                </ul>
                <div class="header-utility-search-wrapper">
                  <form class="form-inline site-search" method="get" action="https://ui.uncc.edu/my_search/google" >
                    <div class="form-group">
                      <input type="text" class="form-control utility-search-input" placeholder="Search" name="my_gcs" aria-label="Search">
                      <button type="submit" class="btn utility-search-button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                  </form>
                </div>
              </div>

            </div> <!-- /#unccedu-header-watermark -->
          </div> <!-- /.container -->
        </header>


        <!-- since this breaks the grid, we must completely custom style without bootstrap -->
        <?php if (!empty($page['header'])): ?>
        <div class="banner-wrapper">

            <div class="region region-banner">
              <section>
              	<?php print render($page['header']); ?>
              </section>
            </div>

        </div>
		<?php endif; ?>

	<div class="container main-nav">
	<!-- nav class="navbar-default" -->
		<nav class="navbar navbar-default navbar-<?php print $nav_style; ?>">
	        <!--.container-fluid -->
	        <div class="container-fluid">

	            <div class="navbar-header">
	            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	            </div>

	          <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
	          <div class="navbar-collapse collapse" id="navbar">

	            <?php if (!empty($primary_nav)): ?>
	              <!-- primary_nav -->
	              <?php print render($primary_nav); ?>
	            <?php endif; ?>

	            <?php if (!empty($page['navigation'])): ?>
	              <!-- navigation -->
	              <?php print render($page['navigation']); ?>
	            <?php endif; ?>

	          </div><!--/.nav-collapse -->
	          <?php endif; ?>
	        
	        </div>
	        <!--/.container-fluid -->
		</nav>
	</div><!-- /.container -->



	<div class="container main-content">

		<?php if (!empty($page['highlighted'])): ?>
		<div class="row">
			<div class="col-sm-12">
				  <?php print render($page['highlighted']); ?>
			</div>
		</div>
		<?php endif; ?>

		<div class="row">

			<?php if (!empty($page['sidebar_first'])): ?>
			  <aside class="col-sm-3 sidebar" role="complementary">
			    <?php print render($page['sidebar_first']); ?>
			  </aside>  <!-- /#sidebar-first -->
			<?php endif; ?>

			<section<?php print $content_column_class; ?>>
				<div class="blog-post entry-content">

					<?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
					<a id="main-content"></a>
					<?php print render($title_prefix); ?>
					<?php if (!empty($title)): ?>
					  <h1 class="page-header"><?php print $title; ?></h1>
					<?php endif; ?>
					<?php print render($title_suffix); ?>
					<?php print $messages; ?>
					<?php if (!empty($tabs)): ?>
					  <?php print render($tabs); ?>
					<?php endif; ?>
					<?php if (!empty($page['help'])): ?>
					  <?php print render($page['help']); ?>
					<?php endif; ?>
					<?php if (!empty($action_links)): ?>
					  <ul class="action-links"><?php print render($action_links); ?></ul>
					<?php endif; ?>
					<?php print render($page['content']); ?>
					<?php print render($page['content_secondary']); ?>
				</div><!-- /.blog-post -->
			</section><!-- /.col-sm-8 .blog-main -->


			<?php if (!empty($page['sidebar_second'])): ?>
			  <aside class="col-sm-3 sidebar" role="complementary">
			  	<div class="sidebar-module">
			    	<?php print render($page['sidebar_second']); ?>
			    </div>
			  </aside>  <!-- /#sidebar-second -->
			<?php endif; ?>

			</div><!-- /.row -->
	</div><!-- /.container -->

	<footer class="container">

		  <?php // print render($secondary_nav); ?>



		<div class="row vertical-align" id="footer-utility-bar">

		    <div class="col-md-9 hidden-xs" id="footer-links">
		      <ul class="list-inline">
		        <li><img src="/sites/all/themes/uncc_bootstrap/img/crown-small.png" alt="Small UNC Charlotte Crown Logo"></li>
		        <li><a href="http://www.unccharlottealerts.com" target="_blank" title="Alerts and Advisories at UNC Charlotte">Alerts</a></li>
		        <li><a href="https://jobs.uncc.edu" title="Jobs at UNC Charlotte">Jobs</a></li>
		        <li><a href="http://www.uncc.edu/makeagift" title="Make a gift to UNC Charlotte">Make a Gift</a></li>
		        <li><a href="http://www.uncc.edu/directions" title="Directions to UNC Charlotte">Maps / Directions</a></li>
		        <li><a href="https://textonly.uncc.edu?1343005729" title="View this page as text only">Text Only</a></li>
		        <li><img width="20" height="20" src="/sites/all/themes/uncc_bootstrap/img/accessibility-icon.png" alt="accessibility icon" title="accessibilty icon"> <a href="http://www.uncc.edu/accessibility" title="Accessibility resources at UNC Charlotte">Accessibility</a></li>
		      </ul>
		    </div> <!--/#footer-links-->
		    <div class="col-md-3 hidden-xs" id="footer-search">
		      <form class="form-inline site-search" method="get" action="https://search.uncc.edu/website/" >
		        <div class="form-group">
		          <input type="text" class="form-control utility-search-input" placeholder="Search uncc.edu" aria-label="Search">
		          <button type="submit" class="btn utility-search-button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
		        </div>
		      </form>
		    </div> <!--/#footer-search-->

		</div>
		<div class="row">

		    <div class="col-md-8" id="footer-university-info">
		          <div id="university-name"><a href="http://www.uncc.edu">The University of North Carolina at Charlotte</a></div>
		          <div id="university-address">9201 University City Blvd, Charlotte, NC 28223-0001 - 704-687-8622</div>
		          <div id="university-legal">&copy; 2016 UNC Charlotte | All Rights Reserved | <a href="http://legal.uncc.edu/termsofuse" title="">Terms of Use</a> | <a href="http://legal.uncc.edu/policies" title="">University Policies</a> | <a href="/contact" title="Contact Us">Contact Us</a></div>
		    </div> <!-- #footer-name -->
		    <div class="col-md-3 col-md-offset-1" id="footer-follow">
		      <div id="social-title">Follow UNC Charlotte</div>
		      <div class="facebook social-icons"><a href="http://www.facebook.com/UNCCharlotte" title="Facebook" target="_blank"><img width="20" height="20" src="/sites/all/themes/uncc_bootstrap/img/1x1.gif" alt="Facebook"></a></div>
		      <div class="blog social-icons"><a href="http://unccltnews.blogspot.com/" title="Blogger" target="_blank"><img width="20" height="20" src="/sites/all/themes/uncc_bootstrap/img/1x1.gif" alt="Blogger"></a></div>
		      <div class="twitter social-icons"><a href="http://twitter.com/UNCCharlotte" title="Twitter" target="_blank"><img width="20" height="20" src="/sites/all/themes/uncc_bootstrap/img/1x1.gif" alt="Twitter"></a></div>
		      <div class="flickr social-icons"><a href="http://www.flickr.com/photos/stakeyourclaim/sets" title="Flickr" target="_blank"><img width="20" height="20" src="/sites/all/themes/uncc_bootstrap/img/1x1.gif" alt="Flickr"></a></div>
		      <div class="youtube social-icons"><a href="http://www.youtube.com/unccharlottevideo" title="YouTube" target="_blank"><img width="20" height="20" src="/sites/all/themes/uncc_bootstrap/img/1x1.gif" alt="YouTube"></a></div>
		    </div> <!-- #footer-follow -->

		</div>
		<?php print render($page['footer']); ?>
    </footer>
