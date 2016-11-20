<!-- header-top start (Add "dark" class to .header-top in order to enable dark header-top e.g <div class="header-top dark">) -->
<!-- ================ -->
<div class="header-top transparent dark fixed header-small clearfix">
	<div class="container">
		<div class="row">
			<div class="col-xs-2 col-sm-6">

				<!-- header-top-first start -->
				<!-- ================ -->
				<div class="header-top-first clearfix">
					<ul class="social-links clearfix hidden-xs">
						<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
						<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
						<li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
						<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
						<li class="youtube"><a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube-play"></i></a></li>
						<li class="flickr"><a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a></li>
						<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
						<li class="pinterest"><a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a></li>
					</ul>
					<div class="social-links hidden-lg hidden-md hidden-sm">
						<div class="btn-group dropdown">
							<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-share-alt"></i></button>
							<ul class="dropdown-menu dropdown-animation">
								<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
								<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
								<li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
								<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
								<li class="youtube"><a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube-play"></i></a></li>
								<li class="flickr"><a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a></li>
								<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
								<li class="pinterest"><a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- header-top-first end -->

			</div>
			<div class="col-xs-10 col-sm-6">

				<!-- header-top-second start -->
				<!-- ================ -->
				<div id="header-top-second" class="clearfix">

					<!-- header top dropdowns start -->
					<!-- ================ -->
					<div class="header-top-dropdown">
						<div class="btn-group dropdown">
							<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i> Search</button>
							<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
								<li>
									<form role="search" class="search-box" method="post" action="{$smarty.const.BASE_URL}search/results">
										<div class="form-group has-feedback">
											<input type="text" class="form-control" name="search-query" placeholder="Search">
											<i class="fa fa-search form-control-feedback"></i>
											
										</div>
									</form>
								</li>
							</ul>
						</div>
						<div class="btn-group dropdown">
							<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Logged in as {$smarty.session.username}</button>
							<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
								<li><a class="btn btn-group btn-default btn-sm" href="{$smarty.const.BASE_URL}member/edit">Edit Profile</a></li>
								<li><a class="btn btn-group btn-default btn-sm" href="{$smarty.const.BASE_URL}login/logout">Log Out</a></li>
							</ul>
						</div>
						<div class="btn-group dropdown">
							<button type="button" title="Log Out" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-power-off"></i> </button>
						</div>

					</div>
					<!--  header top dropdowns end -->

				</div>
				<!-- header-top-second end -->

			</div>
		</div>
	</div>
</div>
<!-- header-top end -->

<!-- header start classes:
	fixed: fixed navigation mode (sticky menu) e.g. <header class="header fixed clearfix">
	 dark: dark header version e.g. <header class="header dark clearfix">
================ -->
<header class="header dark fixed clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-3">

				<!-- header-left start -->
				<!-- ================ -->
				<div class="header-left clearfix">

					<!-- logo -->
					<div class="logo">
						<a href="{$smarty.const.BASE_URL}"><img id="logo" src="{$smarty.const.BASE_URL}media/default/images/logo.png" alt="{$smarty.const.BASE_URL}"></a>
					</div>

					<!-- name-and-slogan
					<div class="site-slogan">
						PHP Framework
					</div>
					-->

				</div>
				<!-- header-left end -->

			</div>
			<div class="col-md-9">

				<!-- header-right start -->
				<!-- ================ -->
				<div class="header-right clearfix">

					<!-- main-navigation start -->
					<!-- ================ -->
					<div class="main-navigation animated">

						<!-- navbar start -->
						<!-- ================ -->
						<nav class="navbar navbar-default" role="navigation">
							<div class="container-fluid">

								<!-- Toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="navbar-collapse-1">
									<ul class="nav navbar-nav navbar-right">
										<li class="dropdown active">
											<a href=""{$smarty.const.BASE_URL}" class="dropdown-toggle" data-toggle="dropdown">Home</a>
											<ul class="dropdown-menu">
												<li class="active"><a href=""{$smarty.const.BASE_URL}">Home - Default</a></li>
												<li><a href="index-2.html">Home - 2</a></li>
												<li><a href="index-3.html">Home - 3</a></li>
												<li><a href="index-4.html">Home - 4</a></li>
												<li><a href="index-5.html">Home - 5</a></li>
												<li><a href="index-6.html">Home - 6 <span class="badge">v1.2</span></a></li>
												<li><a href="index-7.html">Home - 7 <span class="badge">v1.2</span></a></li>
												<li><a href="index-landing.html">Home - Landing <span class="badge">v1.3</span></a></li>
												<li><a href="index-text-rotator.html">Home - Text Rotator <span class="badge">v1.3</span></a></li>
												<li><a href="index-video-background.html">Home - Video Bg <span class="badge">v1.3</span></a></li>
												<li><a href="index-shop.html">Home - Shop <span class="badge">v1.2</span></a></li>
												<li><a href="index-one-page.html">One Page Version</a></li>
												<li><a href="index-boxed-slideshow.html">Home - Boxed Slider</a></li>
												<li><a href="index-no-slideshow.html">Home - Without Slider</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Features</a>
											<ul class="dropdown-menu">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">Email Templates <span class="default-bg badge">v1.1</span></a>
													<ul class="dropdown-menu">
														<li><a target="_blank" href="../email_templates/email_template_red.html">Email Template Red</a></li>
														<li><a target="_blank" href="../email_templates/email_template_blue.html">Email Template Blue</a></li>
														<li><a target="_blank" href="../email_templates/email_template_brown.html">Email Template Brown</a></li>
														<li><a target="_blank" href="../email_templates/email_template_dark_cyan.html">Email Template Dark Cyan</a></li>
														<li><a target="_blank" href="../email_templates/email_template_dark_gray.html">Email Template Dark Gray</a></li>
														<li><a target="_blank" href="../email_templates/email_template_dark_red.html">Email Template Dark Red</a></li>
														<li><a target="_blank" href="../email_templates/email_template_green.html">Email Template Green</a></li>
														<li><a target="_blank" href="../email_templates/email_template_light_blue.html">Email Template Light Blue</a></li>
														<li><a target="_blank" href="../email_templates/email_template_light_green.html">Email Template Light Green</a></li>
														<li><a target="_blank" href="../email_templates/email_template_orange.html">Email Template Orange</a></li>
														<li><a target="_blank" href="../email_templates/email_template_pink.html">Email Template Pink</a></li>
														<li><a target="_blank" href="../email_templates/email_template_purple.html">Email Template Purple</a></li>
														<li><a target="_blank" href="../email_templates/email_template_yellow.html">Email Template Yellow</a></li>
													</ul>
												</li>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">Headers <span class="default-bg badge">v1.2</span></a>
													<ul class="dropdown-menu">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">Layouts <span class="default-bg badge">v1.1</span></a>
															<ul class="dropdown-menu">
																<li><a href="features-header-1.html">Light - Layout 1 (Default)</a></li>
																<li><a href="features-header-2.html">Light - Layout 2</a></li>
																<li><a href="features-header-3.html">Light - Layout 3</a></li>
																<li><a href="features-header-1-dark.html">Dark - Layout 1 <span class="default-bg badge">v1.1</span></a></li>
																<li><a href="features-header-2-dark.html">Dark - Layout 2 <span class="default-bg badge">v1.1</span></a></li>
																<li><a href="features-header-3-dark.html">Dark - Layout 3 <span class="default-bg badge">v1.1</span></a></li>
															</ul>
														</li>
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">Transparent <span class="default-bg badge">v1.2</span></a>
															<ul class="dropdown-menu">
																<li><a href="features-header-transparent.html">Light Version</a></li>
																<li><a href="features-header-transparent-dark.html">Dark Version</a></li>
															</ul>
														</li>
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">Left Side Header  <span class="default-bg badge">v1.2</span></a>
															<ul class="dropdown-menu">
																<li><a href="features-header-offcanvas-left.html">Light Version </a></li>
																<li><a href="features-header-offcanvas-left-dark.html">Dark Version </a></li>
															</ul>
														</li>
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">Right Side Header <span class="default-bg badge">v1.2</span></a>
															<ul class="dropdown-menu">
																<li><a href="features-header-offcanvas-right.html">Light Version </a></li>
																<li><a href="features-header-offcanvas-right-dark.html">Dark Version </a></li>
															</ul>
														</li>
													</ul>
												</li>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">Footers</a>
													<ul class="dropdown-menu">
														<li><a href="features-footer-1.html#footer">Footer 1 (Default)</a></li>
														<li><a href="features-footer-2.html#footer">Footer 2</a></li>
														<li><a href="features-footer-3.html#footer">Footer 3</a></li>
														<li><a href="features-footer-4.html#footer">Footer 4</a></li>
													</ul>
												</li>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sliders - Revolution 5 <span class="default-bg badge">NEW</span></a>
													<ul class="dropdown-menu">
														<li><a href="features-sliders-fullwidth.html">Full Width</a></li>
														<li><a href="features-sliders-fullscreen-light.html">Full Screen - Light</a></li>
														<li><a href="features-sliders-fullscreen-dark.html">Full Screen - Dark</a></li>
														<li><a href="features-sliders-video-background.html">Video Background</a></li>
														<li><a href="features-sliders-boxedwidth.html">Boxed Width</a></li>
													</ul>
												</li>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login/Sign Up <span class="default-bg badge">v1.2</span></a>
													<ul class="dropdown-menu">
														<li><a href="page-login.html">Login</a></li>
														<li><a href="page-signup.html">Sign Up</a></li>
														<li><a href="page-login-2.html">Login Fullscreen</a></li>
														<li><a href="page-signup-2.html">Sign Up Fullscreen</a></li>
													</ul>
												</li>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pricing tables</a>
													<ul class="dropdown-menu">
														<li><a href="features-pricing-tables-1.html">Pricing Tables 1</a></li>
														<li><a href="features-pricing-tables-2.html">Pricing Tables 2</a></li>
														<li><a href="features-pricing-tables-3.html">Pricing Tables 3</a></li>
													</ul>
												</li>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">Icons</a>
													<ul class="dropdown-menu">
														<li><a href="features-icons-fontawesome.html">Font Awesome Icons</a></li>
														<li><a href="features-icons-fontello.html">Fontello Icons</a></li>
														<li><a href="features-icons-glyphicons.html">Glyphicons Icons</a></li>
													</ul>
												</li>															
												<li><a href="features-typography.html">Typography</a></li>
												<li><a href="features-backgrounds.html">Backgrounds</a></li>
												<li><a href="features-background-patterns.html">Patterns <span class="default-bg badge">v1.2</span></a></li>
												<li><a href="features-testimonials.html">Testimonials</a></li>
												<li><a href="features-grid.html">Grid System</a></li>
											</ul>
										</li>													
										<!-- mega-menu start -->
										<li class="dropdown mega-menu">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
											<ul class="dropdown-menu">
												<li>
													<div class="row">
														<div class="col-lg-4 col-md-3 hidden-sm">
															<h4>Premium HTML5 Template</h4>
															<p>iDea is perfectly suitable for corporate, business and company webpages.</p>
															<img src="{$smarty.const.BASE_URL}media/default/images/section-image-3.png" alt="iDea">
														</div>
														<div class="col-lg-8 col-md-9">
															<h4>Pages</h4>
															<div class="row">
																<div class="col-sm-4">
																	<div class="divider"></div>
																	<ul class="menu">
																		<li><a href="page-about.html"><i class="icon-right-open"></i>About Us</a></li>
																		<li><a href="page-about-2.html"><i class="icon-right-open"></i>About Us 2</a></li>
																		<li><a href="page-about-3.html"><i class="icon-right-open"></i>About Us 3</a></li>
																		<li><a href="page-about-me.html"><i class="icon-right-open"></i>About Me</a></li>
																		<li><a href="page-team.html"><i class="icon-right-open"></i>Our Team - Options</a></li>
																		<li><a href="page-services.html"><i class="icon-right-open"></i>Services</a></li>
																	</ul>
																</div>
																<div class="col-sm-4">
																	<div class="divider"></div>
																	<ul class="menu">
																		<li><a href="page-contact.html"><i class="icon-right-open"></i>Contact</a></li>
																		<li><a href="page-contact-2.html"><i class="icon-right-open"></i>Contact 2</a></li>
																		<li><a href="page-coming-soon.html"><i class="icon-right-open"></i>Coming Soon Page</a></li>
																		<li><a href="page-404.html"><i class="icon-right-open"></i>404 error</a></li>
																		<li><a href="page-faq.html"><i class="icon-right-open"></i>FAQ page</a></li>
																		<li><a href="page-affix-sidebar.html"><i class="icon-right-open"></i>Sidebar - Affix Menu</a></li>
																	</ul>
																</div>
																<div class="col-sm-4">
																	<div class="divider"></div>
																	<ul class="menu">
																		<li><a href="page-left-sidebar.html"><i class="icon-right-open"></i>Left Sidebar</a></li>
																		<li><a href="page-right-sidebar.html"><i class="icon-right-open"></i>Right Sidebar</a></li>
																		<li><a href="page-two-sidebars.html"><i class="icon-right-open"></i>Two Sidebars</a></li>
																		<li><a href="page-no-sidebar.html"><i class="icon-right-open"></i>No Sidebars</a></li>
																		<li><a href="page-sitemap.html"><i class="icon-right-open"></i>Sitemap</a></li>
																		<li><a href="page-invoice.html"><i class="icon-right-open"></i>Invoice <span class="badge">v1.1</span></a></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</li>
										<!-- mega-menu end -->
										<!-- mega-menu start -->
										<li class="dropdown mega-menu">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Components</a>
											<ul class="dropdown-menu">
												<li>
													<div class="row">
														<div class="col-sm-4 col-md-6">
															<h4>iDea - Powerful Bootstrap Theme</h4>
															<p>iDea is a Clean and Super Flexible Bootstrap Theme with many Features and Unlimited options.</p>
															<img src="{$smarty.const.BASE_URL}media/default/images/section-image-1.png" alt="image-1">
														</div>
														<div class="col-sm-8 col-md-6">
															<h4>Components</h4>
															<div class="row">
																<div class="col-sm-6">
																	<div class="divider"></div>
																	<ul class="menu">
																		<li><a href="components-tabs-and-pills.html"><i class="icon-right-open"></i>Tabs &amp; Pills</a></li>
																		<li><a href="components-accordions.html"><i class="icon-right-open"></i>Accordions</a></li>
																		<li><a href="components-social-icons.html"><i class="icon-right-open"></i>Social Icons</a></li>
																		<li><a href="components-buttons.html"><i class="icon-right-open"></i>Buttons</a></li>
																		<li><a href="components-forms.html"><i class="icon-right-open"></i>Forms</a></li>
																		<li><a href="components-progress-bars.html"><i class="icon-right-open"></i>Progress bars</a></li>
																		<li><a href="components-alerts-and-callouts.html"><i class="icon-right-open"></i>Alerts &amp; Callouts</a></li>
																		<li><a href="components-content-sliders.html"><i class="icon-right-open"></i>Content Sliders</a></li>
																		<li><a href="components-text-rotators.html"><i class="icon-right-open"></i>Text Rotators  <span class="badge">v1.3</span></a></li>
																	</ul>
																</div>
																<div class="col-sm-6">
																	<div class="divider"></div>
																	<ul class="menu">
																		<li><a href="components-lightbox.html"><i class="icon-right-open"></i>Lightbox</a></li>
																		<li><a href="components-icon-boxes.html"><i class="icon-right-open"></i>Icon Boxes</a></li>
																		<li><a href="components-image-boxes.html"><i class="icon-right-open"></i>Image Boxes</a></li>
																		<li><a href="components-video-and-audio.html"><i class="icon-right-open"></i>Video &amp; Audio</a></li>
																		<li><a href="components-modals.html"><i class="icon-right-open"></i>Modals</a></li>
																		<li><a href="components-animations.html"><i class="icon-right-open"></i>Animations</a></li>
																		<li><a href="components-counters.html"><i class="icon-right-open"></i>Counters</a></li>
																		<li><a href="components-tables.html"><i class="icon-right-open"></i>Tables</a></li>
																		<li><a href="components-charts.html"><i class="icon-right-open"></i>Charts <span class="badge">v1.3</span></a></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</li>
										<!-- mega-menu end -->
										<li class="dropdown">
											<a href="portfolio-3col.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio</a>
											<ul class="dropdown-menu">
												<li class="dropdown">
													<a href="portfolio-3col.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio - Style 1</a>
													<ul class="dropdown-menu">
														<li><a href="portfolio-2col.html">Portfolio - 2 columns</a></li>
														<li><a href="portfolio-3col.html">Portfolio - 3 columns</a></li>
														<li><a href="portfolio-4col.html">Portfolio - 4 columns</a></li>
														<li><a href="portfolio-sidebar.html">Portfolio - With sidebar</a></li>
													</ul>
												</li>
												<li class="dropdown">
													<a href="portfolio-3col-2.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio - Style 2</a>
													<ul class="dropdown-menu">
														<li><a href="portfolio-2col-2.html">Portfolio - 2 columns</a></li>
														<li><a href="portfolio-3col-2.html">Portfolio - 3 columns</a></li>
														<li><a href="portfolio-4col-2.html">Portfolio - 4 columns</a></li>
														<li><a href="portfolio-sidebar-2.html">Portfolio - With sidebar</a></li>
													</ul>
												</li>
												<li class="dropdown">
													<a href="portfolio-3col-3.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio - Style 3</a>
													<ul class="dropdown-menu">
														<li><a href="portfolio-2col-3.html">Portfolio - 2 columns</a></li>
														<li><a href="portfolio-3col-3.html">Portfolio - 3 columns</a></li>
														<li><a href="portfolio-4col-3.html">Portfolio - 4 columns</a></li>
														<li><a href="portfolio-sidebar-3.html">Portfolio - With sidebar</a></li>
													</ul>
												</li>
												<li class="dropdown">
													<a href="portfolio-list-sidebar.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio - List <span class="badge">v1.3</span></a>
													<ul class="dropdown-menu">
														<li><a href="portfolio-list-1.html">List - Large Image <span class="badge">v1.3</span></a></li>
														<li><a href="portfolio-list-2.html">List - Small Image <span class="badge">v1.3</span></a></li>
														<li><a href="portfolio-list-sidebar.html">List - Sidebar <span class="badge">v1.3</span></a></li>
													</ul>
												</li>
												<li><a href="portfolio-full.html">Portfolio - Full width</a></li>
												<li><a href="portfolio-item.html">Portfolio single</a></li>
												<li><a href="portfolio-item-2.html">Portfolio single 2</a></li>
												<li><a href="portfolio-item-3.html">Portfolio single 3</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a href="shop-listing-3col.html" class="dropdown-toggle" data-toggle="dropdown">Shop</a>
											<ul class="dropdown-menu">
												<li><a href="index-shop.html">Shop - Home <span class="default-bg badge">v1.2</span></a></li>
												<li><a href="shop-listing-3col.html">Shop - 3 Columns</a></li>
												<li><a href="shop-listing-4col.html">Shop - 4 Columns</a></li>
												<li><a href="shop-listing-sidebar.html">Shop - With Sidebar</a></li>
												<li><a href="shop-product.html">Product</a></li>
												<li><a href="shop-cart.html">Shopping Cart</a></li>
												<li><a href="shop-checkout.html">Checkout Page - Step 1</a></li>
												<li><a href="shop-checkout-payment.html">Checkout Page - Step 2</a></li>
												<li><a href="shop-checkout-review.html">Checkout Page - Step 3</a></li>
											</ul>
										</li>
										<li class="dropdown">
											<a href="blog-right-sidebar.html" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
											<ul class="dropdown-menu">
												<li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
												<li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
												<li><a href="blog-no-sidebar.html">Blog No Sidebars</a></li>
												<li><a href="blog-masonry.html">Blog Masonry</a></li>
												<li><a href="blog-masonry-sidebar.html">Blog Masonry - Sidebar</a></li>
												<li><a href="blog-timeline.html">Blog Timeline</a></li>
												<li><a href="blog-post.html">Blog post</a></li>
											</ul>
										</li>
									</ul>
								</div>

							</div>
						</nav>
						<!-- navbar end -->

					</div>
					<!-- main-navigation end -->

				</div>
				<!-- header-right end -->

			</div>
		</div>
	</div>
</header>
<!-- header end -->
