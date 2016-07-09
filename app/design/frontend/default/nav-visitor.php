<?php
$page = $app['router']->controller;
$active = ' active';
?>

<?php /*Header Start*/ ?>
<header  data-spy="affix" data-offset-top="1" class="clearfix">
    <section class="toolbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 left_bar">
                    <ul class="left-none">
                        <?php /* <li><a href="<?=BASE_URL;?>login"><i class="fa fa-user"></i> Login</a></li> */ ?>
                        <?php /*<li><a href="#"><i class="fa fa-globe"></i> Languages</a></li>*/ ?>
                        <?php /* <li><i class="fa fa-search"></i>
                            <input type="search" placeholder="Search" class="search_box">
                        </li> */ ?>
                    </ul>
                </div>
                <div class="col-lg-6 ">
                    <ul class="right-none pull-right company_info">
                        <li><a href="<?=BASE_URL;?>login"><i class="fa fa-user"></i> Login</a></li>
                        <?php /* <li><a href="tel:18005670123"><i class="fa fa-phone"></i> <?=$this->config->setting['telephone'];?></a></li>
                        <li class="address"><a href="contact.html"><i class="fa fa-map-marker"></i>
                        <?=$this->config->setting['street_address'];?>
                        <?=$this->config->setting['city'];?>, <?=$this->config->setting['state'];?>
                        <?=$this->config->setting['zipcode'];?></a></li> */ ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="toolbar_shadow"></div>
    </section>
    <div class="bottom-header" >
        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <?php /* Brand and toggle get grouped for better mobile display */ ?>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
                            <span class="sr-only">Toggle navigation</span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                        </button>
                        <a class="navbar-brand" href="<?=BASE_URL;?>">
                        <span class="logo">
                            <img src="<?= MEDIA_URL;?>logo.png" style="max-height: 32px; max-width: 160px; margin-top: 10px;" />
                        </span>
                        <!-- <span class="secondary_text"><?=$this->config->setting['site_slogan'];?></span></span> -->
                        </a>
                        </div>

                    <?php /* Collect the nav links, forms, and other content for toggling */ ?>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav pull-right">
                            <li class="<?php if($page == 'Documentation') echo $active; ?>"><a href="<?=BASE_URL;?>support">Documentation</a></li>
                            <li class="<?php if($page == 'Download') echo $active; ?>"><a href="<?=BASE_URL;?>download">Download</a></li>
                            <li class="dropdown <?php if($page == 'Faq') echo $active; ?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Community <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=BASE_URL;?>faq">FAQ</a></li>
                                    <li><a href="<?=BASE_URL;?>forums">Support Forums</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <?php /* /.navbar-collapse */ ?>
                </div>
                <?php /* /.container-fluid */ ?>
            </nav>
        </div>
        <div class="header_shadow"></div>
    </div>
</header>
<?php /*Header End*/ ?>
