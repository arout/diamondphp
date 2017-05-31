<?php
/*==========================================================================
|   Uncomment this function to set the page titles in the Breadcrumbs bar  |
|   See the documentation for more information on setting titles           |
==========================================================================*/

function Breadcrumbstitles( $container ) {
    
    $_kw_titles = 
    [
                
        "Welcome_Controller" => 
        [
            "index" => "Welcome to kW Fusion"
        ],
                        
        "Member_Controller" => 
        [
            "index" => "View member profiles on ".$container['config']->setting['site_name']."",
            "edit" => "Editing ".$container['session']->get('username')."'s profile on ".$container['config']->setting['site_name']."",
            "profile" => "Editing ".$container['session']->get('username')."'s profile on ".$container['config']->setting['site_name']."",
            "register" => "Create an account on ".$container['config']->setting['site_name']."",
            "signup" => "Create an account on ".$container['config']->setting['site_name']."",
            "view" => "Viewing ".$container['router']->param1."'s profile on ".$container['config']->setting['site_name']."",
            "change_password" => "Change Password | MVC Framework for PHP 5.5+"
        ],
        
        "Messenger_Controller" => 
        [
            "index" => "Viewing All Messages ".$container['config']->setting['site_name']."",
            "send" => "Send message to ".$container['router']->param1."",
            "profile" => "Editing ".$container['session']->get('username')."'s profile on ".$container['config']->setting['site_name']."",
            "register" => "Create an account on ".$container['config']->setting['site_name']."",
            "signup" => "Create an account on ".$container['config']->setting['site_name']."",
            "view" => "Viewing ".$container['router']->param1."'s profile on ".$container['config']->setting['site_name']."",
            "change_password" => "Change Password | MVC Framework for PHP 5.5+"
        ],
        
        "Support_Controller" => 
        [
            "index" => "Documentation | ".$container['config']->setting['site_name']."",
            "toolbox" => "Toolbox Documentation",
            "docs" => "Documentation | ".$container['config']->setting['site_name'].""
        ],
        
        "Login_Controller" => 
        [
            "index" => "Login to your account on ". $container['config']->setting['site_name']
        ],
                        
        "Test_Controller" => 
        [
            "bc_title" => "Breadcrumb title testing on ". $container['config']->setting['site_name'],
            "image" => "Image testing on ". $container['config']->setting['site_name']
        ]
                        
    ];
                
    return $_kw_titles;
       
}
