<!--header start classes:
        fixed: fixed navigation mode (sticky menu) e.g. <header class="header fixed clearfix">
         dark: dark header version e.g. <header class="header dark clearfix">
      ================ -->
      <header class="header dark clearfix">
        <div class="container">
          <div class="row">
            <div class="col-md-3">

              <!-- header-left start -->
              <!-- ================ -->
              <div class="header-left clearfix">

                <!-- logo -->
                <div class="logo">
                  <a href="<?=BASE_URL;?>"><img id="logo" src="<?=TEMPLATE_URL;?>images/logo.png" style="margin-top: 10px; max-height: 48px !important;" alt="iDea"></a>
                </div>

                <!-- name-and-slogan -->
                <!-- <div class="site-slogan">
                  <?= $this->config->setting( 'site_slogan' ); ?>
                </div> -->

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
                          <li class="active"><a href="<?=BASE_URL;?>documentation" class="dropdown-toggle">Documentation</a></li>
                          <li class="active"><a href="<?=BASE_URL;?>download" class="dropdown-toggle">Download</a></li>
                                               
                          <!-- mega-menu start -->
                          <li class="dropdown mega-menu">
                            <a href="<?=TEMPLATE_URL;?>#" class="dropdown-toggle" data-toggle="dropdown">Community</a>
                            <ul class="dropdown-menu">
                              <li>
                                <div class="row">
                                  <div class="col-lg-4 col-md-3 hidden-sm">
                                    <h4>Online Support</h4>
                                    <p>Visit the member forums</p>
                                    <img src="<?=TEMPLATE_URL;?>images/section-image-3.png" alt="iDea">
                                  </div>
                                  <div class="col-lg-8 col-md-9">
                                    <h4>Community and Support</h4>
                                    <div class="row">
                                      <div class="col-sm-4">
                                        <div class="divider"></div>
                                        <ul class="menu">
                                          <li><a href="<?=BASE_URL;?>forums"><i class="icon-right-open"></i>Forums</a></li>
                                          <li><a href="<?=BASE_URL;?>documentation/faq"><i class="icon-right-open"></i>FAQ</a></li>
                                        </ul>
                                      </div>
                                      <div class="col-sm-4">
                                        <div class="divider"></div>
                                        <ul class="menu">
                                          <li><a href="<?=BASE_URL;?>contact/support"><i class="icon-right-open"></i>Support</a></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </li>
                          <!-- mega-menu end -->
                          
                         <!--  <li class="dropdown">
                            <a href="<?=TEMPLATE_URL;?>portfolio-3col.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio</a>
                            <ul class="dropdown-menu">
                              <li class="dropdown">
                                <a href="<?=TEMPLATE_URL;?>portfolio-3col.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio - Style 1</a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-2col.html">Portfolio - 2 columns</a></li>
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-3col.html">Portfolio - 3 columns</a></li>
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-4col.html">Portfolio - 4 columns</a></li>
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-sidebar.html">Portfolio - With sidebar</a></li>
                                </ul>
                              </li>
                              <li class="dropdown">
                                <a href="<?=TEMPLATE_URL;?>portfolio-3col-2.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio - Style 2</a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-2col-2.html">Portfolio - 2 columns</a></li>
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-3col-2.html">Portfolio - 3 columns</a></li>
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-4col-2.html">Portfolio - 4 columns</a></li>
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-sidebar-2.html">Portfolio - With sidebar</a></li>
                                </ul>
                              </li>
                              <li class="dropdown">
                                <a href="<?=TEMPLATE_URL;?>portfolio-3col-3.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio - Style 3</a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-2col-3.html">Portfolio - 2 columns</a></li>
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-3col-3.html">Portfolio - 3 columns</a></li>
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-4col-3.html">Portfolio - 4 columns</a></li>
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-sidebar-3.html">Portfolio - With sidebar</a></li>
                                </ul>
                              </li>
                              <li class="dropdown">
                                <a href="<?=TEMPLATE_URL;?>portfolio-list-sidebar.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio - List <span class="badge">v1.3</span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-list-1.html">List - Large Image <span class="badge">v1.3</span></a></li>
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-list-2.html">List - Small Image <span class="badge">v1.3</span></a></li>
                                  <li><a href="<?=TEMPLATE_URL;?>portfolio-list-sidebar.html">List - Sidebar <span class="badge">v1.3</span></a></li>
                                </ul>
                              </li>
                              <li><a href="<?=TEMPLATE_URL;?>portfolio-full.html">Portfolio - Full width</a></li>
                              <li><a href="<?=TEMPLATE_URL;?>portfolio-item.html">Portfolio single</a></li>
                              <li><a href="<?=TEMPLATE_URL;?>portfolio-item-2.html">Portfolio single 2</a></li>
                              <li><a href="<?=TEMPLATE_URL;?>portfolio-item-3.html">Portfolio single 3</a></li>
                            </ul>
                          </li>
                          <li class="dropdown">
                            <a href="<?=TEMPLATE_URL;?>shop-listing-3col.html" class="dropdown-toggle" data-toggle="dropdown">Shop</a>
                            <ul class="dropdown-menu">
                              <li><a href="<?=TEMPLATE_URL;?>index-shop.html">Shop - Home <span class="default-bg badge">v1.2</span></a></li>
                              <li><a href="<?=TEMPLATE_URL;?>shop-listing-3col.html">Shop - 3 Columns</a></li>
                              <li><a href="<?=TEMPLATE_URL;?>shop-listing-4col.html">Shop - 4 Columns</a></li>
                              <li><a href="<?=TEMPLATE_URL;?>shop-listing-sidebar.html">Shop - With Sidebar</a></li>
                              <li><a href="<?=TEMPLATE_URL;?>shop-product.html">Product</a></li>
                              <li><a href="<?=TEMPLATE_URL;?>shop-cart.html">Shopping Cart</a></li>
                              <li><a href="<?=TEMPLATE_URL;?>shop-checkout.html">Checkout Page - Step 1</a></li>
                              <li><a href="<?=TEMPLATE_URL;?>shop-checkout-payment.html">Checkout Page - Step 2</a></li>
                              <li><a href="<?=TEMPLATE_URL;?>shop-checkout-review.html">Checkout Page - Step 3</a></li>
                            </ul>
                          </li>
                           -->
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
      <!-- header end