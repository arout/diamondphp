<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php /* Meta, title, CSS, favicons, etc. */ ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$this->toolbox('title')->get();?></title>

    <?php /* Bootstrap */ ?>
    <link href="<?= ADMIN_TEMPLATE_URL;?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php /* Font Awesome */ ?>
    <link href="<?= ADMIN_TEMPLATE_URL;?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <?php /* NProgress */ ?>
    <link href="<?= ADMIN_TEMPLATE_URL;?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <?php /* iCheck */ ?>
    <link href="<?= ADMIN_TEMPLATE_URL;?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <?php /* bootstrap-progressbar */ ?>
    <link href="<?= ADMIN_TEMPLATE_URL;?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <?php /* JQVMap */ ?>
    <link href="<?= ADMIN_TEMPLATE_URL;?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <?php /* Custom Theme Style */ ?>
    <link href="<?= ADMIN_TEMPLATE_URL;?>build/css/custom.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?=MODULES_URL;?>ckeditor/ckeditor.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
    <?php $app['load']->admin_template('nav-visitor.php'); ?>
      <div class="main_container">
        <?php /* page content */ ?>
        <div class="right_col" role="main">