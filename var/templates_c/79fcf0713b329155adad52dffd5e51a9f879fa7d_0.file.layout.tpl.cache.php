<?php
/* Smarty version 3.1.30, created on 2017-05-31 15:51:35
  from "/var/www/html/diamond/app/design/frontend/default/views/layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592f1ec7aa9876_81419609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79fcf0713b329155adad52dffd5e51a9f879fa7d' => 
    array (
      0 => '/var/www/html/diamond/app/design/frontend/default/views/layout.tpl',
      1 => 1496260292,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:error/smarty_tpl.tpl' => 2,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_592f1ec7aa9876_81419609 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '432595602592f1ec7a96d87_17519772';
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1653925738592f1ec7a99dc7_20093826', 'title');
?>
</title>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_803250106592f1ec7a9c264_91706564', 'head');
?>

	</head>

	<body class="front no-trans">
	<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['nav_menu']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


	<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- page wrapper start -->
		<!-- ================ -->
		<div class="page-wrapper">
		
		<!-- page-top start-->
			<!-- ================ -->
			<div class="page-top">
				<div class="container">
					<div class="row">

		
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['content']->value, 'page_content');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['page_content']->value) {
?>
				<?php $___tpl = new Smarty_Internal_Template($_smarty_tpl->tpl_vars['page_content']->value, $_smarty_tpl->smarty, $_smarty_tpl);
if ($___tpl->source->exists) {
unset($___tpl);
$_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['page_content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, true);
} else {
$___tpl->template_resource = "error/smarty_tpl.tpl";
$___tpl->source = Smarty_Resource::source($___tpl);
if ($___tpl->source->exists) {
unset($___tpl);
$_smarty_tpl->_subTemplateRender("file:error/smarty_tpl.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, true);
} else {
unset($___tpl);
}
}
?>

			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


		<?php $___tpl = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl);
if ($___tpl->source->exists) {
unset($___tpl);
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else {
$___tpl->template_resource = "error/smarty_tpl.tpl";
$___tpl->source = Smarty_Resource::source($___tpl);
if ($___tpl->source->exists) {
unset($___tpl);
$_smarty_tpl->_subTemplateRender("file:error/smarty_tpl.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, true);
} else {
unset($___tpl);
}
}
?>

	</body>
</html>
<?php }
/* {block 'title'} */
class Block_1653925738592f1ec7a99dc7_20093826 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
DiamondPHP Framework<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_803250106592f1ec7a9c264_91706564 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'head'} */
}
