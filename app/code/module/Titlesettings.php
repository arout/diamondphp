<?php

function Titlesettings($c)
{
	$kw_default_page_title = (!empty($c['config']->setting['site_slogan']) ? $c['config']->setting['site_slogan'] : $c['config']->setting['site_name']);

	$titles = [

		"Welcome_Controller"       =>
		[
			"index" => "$kw_default_page_title",
		],

		"Documentation_Controller" =>
		[
			"core"         => "Documentation - Core Functionality | DiamondPHP",
			"faq"          => "Frequently Asked Questions | DiamondPHP",
			"index"        => "Documentation - Overview | DiamondPHP",
			"introduction" => "Documentation - Installation and Configuration | DiamondPHP",
			"misc"         => "Documentation | DiamondPHP",
			"modules"      => "Documentation - Developer Toolbox | DiamondPHP",
			"mvc"          => "Documentation - Controllers, Models and Views | DiamondPHP",
		],

		"Download_Controller"      =>
		[
			"index" => "Download DiamondPHP MVC Framework",
		],

		"Member_Controller"        =>
		[
			"index"           => "View member profiles on " . $c['config']->setting['site_name'] . "",
			"edit"            => "Editing " . $c['session']->get('username') . "'s profile on " . $c['config']->setting['site_name'] . "",
			"register"        => "Create an account on " . $c['config']->setting['site_name'] . "",
			"signup"          => "Create an account on " . $c['config']->setting['site_name'] . "",
			"view"            => "Viewing " . $c['router']->param1 . "'s profile on " . $c['config']->setting['site_name'] . "",
			"change_password" => "Change Password | $kw_default_page_title",
		],

		"Messenger_Controller"     =>
		[
			"index"           => "Viewing All Messages " . $c['config']->setting['site_name'] . "",
			"send"            => "Send message to " . $c['router']->param1 . "",
			"profile"         => "Editing " . $c['session']->get('username') . "'s profile on " . $c['config']->setting['site_name'] . "",
			"register"        => "Create an account on " . $c['config']->setting['site_name'] . "",
			"signup"          => "Create an account on " . $c['config']->setting['site_name'] . "",
			"view"            => "Viewing " . $c['router']->param1 . "'s profile on " . $c['config']->setting['site_name'] . "",
			"change_password" => "Change Password | MVC Framework for PHP 5.5+",
		],

		"Login_Controller"         =>
		[
			"index" => "Login to your account on " . $c['config']->setting['site_name'],
		],

	];

	return $titles;
}
