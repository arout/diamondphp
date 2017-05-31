<?php
/* Smarty version 3.1.30, created on 2017-05-31 15:51:35
  from "/var/www/html/diamond/app/design/frontend/default/views/head.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592f1ec7a948b7_86344653',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2725341d52a9f899fca7b5503b65bb84957377a5' => 
    array (
      0 => '/var/www/html/diamond/app/design/frontend/default/views/head.tpl',
      1 => 1481151338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_592f1ec7a948b7_86344653 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '1771450490592f1ec7a708f3_52598682';
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_786640393592f1ec7a74152_49129261', 'title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1629372722592f1ec7a92160_74800476', 'head');
}
/* {block 'title'} */
class Block_786640393592f1ec7a74152_49129261 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['page_title']->value;
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_1629372722592f1ec7a92160_74800476 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<meta charset="utf-8">
	<meta name="description" content="DiamondPHP MVC Framework for PHP 7">
	<meta name="author" content="Andrew Rout <andrew@diamondphp.com>">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" href="images/favicon.ico">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
	
	<link href="<?php echo @constant('BASE_URL');?>
media/default/bootstrap/css/bootstrap.css" rel="stylesheet">
	
	<link href="<?php echo @constant('BASE_URL');?>
media/default/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
	
	<link href="<?php echo @constant('BASE_URL');?>
media/default/fonts/fontello/css/fontello.css" rel="stylesheet">
	
	<link href="<?php echo @constant('BASE_URL');?>
media/default/plugins/rs-plugin/css/settings.css" media="screen" rel="stylesheet">
	<link href="<?php echo @constant('BASE_URL');?>
media/default/plugins/rs-plugin/css/extralayers.css" media="screen" rel="stylesheet">
	<link href="<?php echo @constant('BASE_URL');?>
media/default/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
	<link href="<?php echo @constant('BASE_URL');?>
media/default/css/animations.css" rel="stylesheet">
	<link href="<?php echo @constant('BASE_URL');?>
media/default/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
	
	<link href="<?php echo @constant('BASE_URL');?>
media/default/css/style.css" rel="stylesheet">
	
	<link href="<?php echo @constant('BASE_URL');?>
media/default/css/skins/red.css" rel="stylesheet">
	
	<link href="<?php echo @constant('BASE_URL');?>
media/default/css/custom.css" rel="stylesheet">
	
	<!--[if lt IE 9]>
		<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
	<![endif]-->
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/plugins/jquery.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'head'} */
}
