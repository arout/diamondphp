<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title><?=$this->toolbox('title')->get();?></title>
    <meta name="description" content="iDea a Bootstrap-based, Responsive HTML5 Template">
    <meta name="author" content="htmlcoder.me">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=TEMPLATE_URL;?>images/favicon.ico">

    <!-- Form validation -->
    <link rel="stylesheet" href="<?=MODULES_URL;?>form-validation/vendor/bootstrap/css/bootstrap.css"/>
    
    <!-- Web Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="<?=TEMPLATE_URL;?>bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="<?=TEMPLATE_URL;?>fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Fontello CSS -->
    <link href="<?=TEMPLATE_URL;?>fonts/fontello/css/fontello.css" rel="stylesheet">

    <!-- Plugins -->
    <link href="<?=TEMPLATE_URL;?>plugins/rs-plugin/css/settings.css" media="screen" rel="stylesheet">
    <link href="<?=TEMPLATE_URL;?>plugins/rs-plugin/css/extralayers.css" media="screen" rel="stylesheet">
    <link href="<?=TEMPLATE_URL;?>plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="<?=TEMPLATE_URL;?>css/animations.css" rel="stylesheet">
    <link href="<?=TEMPLATE_URL;?>plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <!-- iDea core CSS file -->
    <link href="<?=TEMPLATE_URL;?>css/style.css" rel="stylesheet">

    <!-- Color Scheme (In order to change the color scheme, replace the red.css with the color scheme that you prefer)-->
    <link href="<?=TEMPLATE_URL;?>css/skins/red.css" rel="stylesheet">

    <!-- Custom css -->
    <link href="<?=TEMPLATE_URL;?>css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?=TEMPLATE_URL;?>https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="<?=TEMPLATE_URL;?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://diamondphp.com/app/design/frontend/default/js/jquery-1.12.0.min.js"></script>
  </head>

  <!-- body classes: 
      "boxed": boxed layout mode e.g. <body class="boxed">
      "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> 
  -->
  <body class="front no-trans">
    <!-- scrollToTop -->
    <!-- ================ -->
    <div class="scrollToTop"><i class="icon-up-open-big"></i></div>

    <!-- page wrapper start -->
    <!-- ================ -->
    <div class="page-wrapper">

      <?php 
        if ($app['session']->get('email') === FALSE)
            $app['load']->template('nav-visitor.php', null, $app);
        else
            $app['load']->template('nav-loggedin.php', null, $app);

        /*
         * This is where we set the sliders
         *
         * ==Format==
         *
         * 'controller/action'  =>  'filename-of-slider'
         *
         */
        $sliders = [
          'home/index' => 'homepage',
          'login' => 'whyregister',
        ];

        $app['slider']->load($sliders);
      ?>

      <!-- page-top start-->
      <!-- ================-->
      <div class="page-top object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              