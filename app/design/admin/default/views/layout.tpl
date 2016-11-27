<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<title>{block name=title}{$page_title}{/block}</title>
			<meta charset="utf-8">
	<meta name="description" content="DiamondPHP Framework Administration Panel">
	<meta name="author" content="Andrew Rout <andrew@diamondphp.com>">

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">

	<!-- Bootstrap -->
    <link href="{$smarty.const.BASE_URL}media/admin/default/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{$smarty.const.BASE_URL}media/admin/default/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{$smarty.const.BASE_URL}media/admin/default/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{$smarty.const.BASE_URL}media/admin/default/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{$smarty.const.BASE_URL}media/admin/default/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{$smarty.const.BASE_URL}media/admin/default/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="{$smarty.const.BASE_URL}media/admin/default/build/css/custom.min.css" rel="stylesheet">
		{block name=head}{/block}
	</head>

	{if $action eq 'login'}
		<body class="login">
		{block name=body}
			{foreach $content as $_page_content}
				{include_if_exists file=$_page_content else="error/smarty_tpl.tpl"}
			{/foreach}
		{/block}
	{else}
		<body class="nav-md">
	<!-- ================ -->
    	<div class="container body">
      		<div class="main_container">
      		{include file="$nav_menu"}
      		<!-- page content -->
    		<div class="right_col" role="main">

			{block name=body}
				{* 
					---------------------------------------------------------------------
					Fetch the requested view file; display Views error page if not found.
					Functionality provided by plugin; unavailable in Smarty3 core?? 
					---------------------------------------------------------------------
					Note about loading multiple views:

					- To load a single view file, use the standard template method:
					  $this->template->assign('content', $content);

					- To load multiple view files, create an array map containing each
					  view file to be loaded, and pass the array to the template method:

					  $content = ['search/results.tpl', 'forms/login.tpl', 'member/edit.tpl'];
					  $this->template->assign('content', $content);

				*}
				{foreach $content as $_page_content}
					{include_if_exists file=$_page_content else="error/smarty_tpl.tpl"}
				{/foreach}
			{/block}
			</div>
			</div>
		</div>
	{/if}
	</body>
</html>
