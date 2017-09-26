<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<title>{block name=title}DiamondPHP Framework{/block}</title>
		{block name=head}{/block}
	</head>

	<body class="front no-trans">
	{* Edit profile alert *}
	{if $profile_data_saved} {include file="alerts/edit_profile.tpl"} {/if}
	{* Password successfully changed alert *}
	{if $new_pw_saved} {include file="alerts/pw_changed.tpl"} {/if}
	{* Message successfully sent alert *}
	{if $message_sent} {include file="alerts/message_sent.tpl"} {/if}

	{include file="$nav_menu"}
	{include_if_exists file="sliders/$slider"}

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
			{foreach $content as $page_content}
				{include_if_exists file=$page_content else="error/smarty_tpl.tpl"}
			{/foreach}

		{include_if_exists file="footer.tpl" else="error/smarty_tpl.tpl"}
	</body>
</html>
