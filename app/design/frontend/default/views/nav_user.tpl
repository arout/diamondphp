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
							<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Logged in as {$username}</button>
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
<header class="header fixed clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-3">

				<!-- header-left start -->
				<!-- ================ -->
				<div class="header-left clearfix">

					<!-- logo -->
					<div class="logo">
						<a href="{$smarty.const.BASE_URL}"><img id="logo" src="{$smarty.const.BASE_URL}media/default/images/logo.png" alt="DiamondPHP MVC Framework for PHP 7"></a>
					</div>

					<!-- name-and-slogan -->
					<div class="slogan text-center">
						{$slogan}
					</div>

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
              <li class="active"><a href="{$smarty.const.BASE_URL}documentation" class="dropdown-toggle">Documentation</a></li>
              <li class="active"><a href="{$smarty.const.BASE_URL}download" class="dropdown-toggle">Download</a></li>
                                   
              <!-- mega-menu start -->
              <li class="dropdown mega-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Community</a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="row">
                      <div class="col-lg-4 col-md-3 hidden-sm">
                        <h4>Online Support</h4>
                        <p>Visit the member forums</p>
                        <img src="{$smarty.const.MEDIA_URL}default/images/section-image-3.png" alt="DiamondPHP MVC framework for PHP 7">
                      </div>
                      <div class="col-lg-8 col-md-9">
                        <h4>Community and Support</h4>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="divider"></div>
                            <ul class="menu">
                              <li><a href="{$smarty.const.BASE_URL}forum/"><i class="icon-right-open"></i>Forums</a></li>
                              <li><a href="{$smarty.const.BASE_URL}documentation/faq"><i class="icon-right-open"></i>FAQ</a></li>
                            </ul>
                          </div>
                          <div class="col-sm-4">
                            <div class="divider"></div>
                            <ul class="menu">
                              <li><a href="{$smarty.const.BASE_URL}contact/support"><i class="icon-right-open"></i>Support</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
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
