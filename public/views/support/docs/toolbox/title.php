<div class="white-row styleSecondBackground">
    
    <div class="row">
        <div class="col-xs-12 text-center"><h1><i class="featured-icon fa fa-crosshairs"></i> Page Meta Title Helper</h1></div>
    </div>
        <div class="clear"></div>
        <p class="text-center">
	        The Page Meta Title helper dynamically sets the page &lt;title>&lt;/title> tags for improved SEO.
        </p>
</div>

<h1 class="text-center">Use it: <code>$this->toolbox('title')</code></h1>

<div class="white-row">
<legend>Syntax and usage</legend>

<p>
    The Page Meta Title helper works nearly identically to the page title function contained in the <a href="<?= BASEURL; ?>support/toolbox/breadcrumbs">Breadcrumb helper</a>. 
    In recap, you set a multi-dimensional array containing each controller as the key, and then the controller action method and it's corresponding title as sub-arrays.   
</p>
<p>
    To set the title in the &lt;title>&lt;/title> tag (located in <code>public/template/header.php</code> by default, unless you are using your own template / templating system), 
    open the <var>Titlesettings.php</var> file, located in <code>vendor/Fusion/Toolbox/Titlesettings.php</code>.
</p>
<p>
    You will find some default sample code to help you get started:
</p>

<pre>
$kw_default_page_title = ( ! empty( $c['config']->setting['site_slogan'] ) ? $c['config']->setting['site_slogan'] : $c['config']->setting['site_name']);
    
    $titles = [
    
        "Welcome_Controller" => [
            "index" => "This will be the HTML title for the index method of the Welcome controller"
        ]
    ];
    return $titles;
</pre>
<br>
<p>
Let's break that down and see what is happening.
</p>

<p>
<code>$kw_default_page_title</code><br>
When an undefined controller or action is found, this variable simply sets that page's &lt;title>&lt;/title> to your company slogan 
(set in <a href="<?= BASEURL; ?>support/docs/configuration">Config.php</a>), or if you did not enter a slogan, it will fallback to just using the website name. You can leave this variable as is, or change it to whatever you wish.
</p>

<p>
<code>$titles</code><br>
Variable that will be storing your arrays. It is recommended to leave this as is. 
</p>

<p>
<code>"Welcome_Controller" => [ ]</code><br>
First, we must declare which controller to set our titles for. In this case, we want to create titles for the Welcome controller, so we create an array with the Welcome controller name as a key. It is very important to note that the controller name that we are declaring <strong>exactly matches</strong> the file name of the controller (minus the ".php" file extension).
</p>

<p>
<code>"index" => "$kw_default_page_title"</code><br>
Now that we have declared our controller, we just need to set titles for any (or all) of the methods contained in the Welcome_Controller.php file. We want to set page titles for the <strong>index()</strong> method and do so by simply entering the <strong>method name</strong> as the key and the <strong>page title</strong> to be displayed as the value, inside the array we created above.<br>
To add more page titles for other methods, we just add additional keys and methods as needed:
</p>

<pre>
$kw_default_page_title = ( ! empty( $c['config']->setting['site_slogan'] ) ? $c['config']->setting['site_slogan'] : $c['config']->setting['site_name']);
    
    $titles = [
    
        "Welcome_Controller" => [
            "index" => "This will be the HTML title for the index method of the Welcome controller",
            "home"  => "This will be the HTML title for the home method of the Welcome controller",
            "about" => "This will be the HTML title for the about method of the Welcome controller"
        ]
    ];
    return $titles;
</pre>

<p>
<strong>To add additional controllers to our page title helper, we simply create another array and repeat the above steps</strong>
We have completed the Welcome page above, but we have many other sections on our website as well. Let's add some page titles to our demo pages.
</p>
<blockquote> Remember to seperate each new array with a comma</blockquote>
<p>
<pre>
$kw_default_page_title = ( ! empty( $c['config']->setting['site_slogan'] ) ? $c['config']->setting['site_slogan'] : $c['config']->setting['site_name']);

$titles = [
    
        "Welcome_Controller" => [
            "index" => "This will be the HTML title for the index method of the Welcome controller",
            "home"  => "This will be the HTML title for the home method of the Welcome controller",
            "about" => "This will be the HTML title for the about method of the Welcome controller"
        ],  // do not forget the closing comma
    
        "Demo_Controller" =>
        [
            "index"    => "Index page of demo controller",
            "demo"     => "kW Fusion Demo Page",
            "download" => "Download kW Fusion"
        ]
    ];
</pre>
<br>

<legend>Adding dynamic data to page titles</legend>
<p class="lead">
If you are not yet familiar with the Developer Toolbox, <a href="<?= BASEURL; ?>support/toolbox/overview">read the toolbox documentation</a> to learn what features are available to you.
</p>

<h5>Adding dynamic data to login page</h5>
<pre>
$kw_default_page_title = ( ! empty( $c['config']->setting['site_slogan'] ) ? $c['config']->setting['site_slogan'] : $c['config']->setting['site_name']);

$titles = [
    
    "Login_Controller" => [
        "index" => "Login to your account on ". $container['config']->setting['site_name']
    ]
];
</pre>


<p>
 The <var>$container</var> variable is a self-contained instance of various services provided by the framework, and gives us a way to provide dynamic capabilities to our page titles. Read on to learn more on how to use this powerful feature!
</p>

<p>
On many of your pages, to improve SEO performance and usability, you may wish to add dynamic data to your page titles. From inside controllers and models, you would use the <code>$this->toolbox</code> function to access toolbox services. Since the page title helper <strong>is</strong> a toolbox service, <code>$this->toolbox</code> of course is not available. Instead, we use the <var>$container</var> variable.<br><br>
In the login example above, <code>$container['config']->setting['site_name']</code> is the equivalent of <code>$this->toolbox('config')->setting['site_name']</code>. More simply put, the syntax is identical, except you replace <strong><var>$this->toolbox('name_of_service')</var></strong> with <strong><var>$container['name_of_service']</var></strong>. With that in mind, it is imperative to get to know what the <a href="<?= BASEURL; ?>support/toolbox/overview">Developer Toolbox</a> has to offer.
</p>




</div>
<?php $this->view('support/helpers'); ?>
