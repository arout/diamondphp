<div class="white-row styleSecondBackground">
    
    <div class="row">
        <div class="col-xs-12 text-center"><h1><i class="featured-icon fa fa-wrench"></i> Developer Toolbox</h1></div>
    </div>
        <div class="clear"></div>
        <p>
	The Toolbox is a handy collection of common developer tools that is used in creating additional functionality for websites. The Toolbox
	is simple to use, and comes loaded with features such as GeoIP location awareness, browser (user agent) data, formatters for date/time/telephone numbers, 
        form validation, pagination and much more!</p>
</div>

<div class="white-row">
<legend><strong>Syntax and Basic Usage</strong></legend>
<p>
	The Toolbox is accessible from inside <a href="<?= BASE_URL; ?>documentation/mvc/controllers">controllers</a>, <a href="<?= BASE_URL; ?>documentation/mvc/models">models</a> and <a href="<?= BASE_URL; ?>documentation/mvc/views">views</a> using the following class method call: 
        <code>$this->toolbox(' name_of_tool ')</code><br> 
    To determine which helpers are available and the name to call them with, <a href="#helpers">click here</a> or view the <code>app/code/core/modules/</code> directory.
        <div class="alert alert-info"><i class="fa fa-info-circle"></i> 
	<em>Replace the <strong>' name_of_tool '</strong> with the specific helper that you wish to use, for example: 
	<code>$this->toolbox(' geoip ')</code><br></em>
        </div>
</p>
<p>
    In the above example, we are accessing the <a href="<?= BASE_URL; ?>documentation/modules/geoip">GeoIP helper</a>. 
    To access data from the GeoIP helper, we would simply implement method chaining: <br>
	<code>$this->toolbox(' geoip ')->ip_address()</code>
</p>
<p>
	By appending <strong>->ip_address()</strong>, we are telling the GeoIP helper to execute the function named <strong>ip_address</strong> contained in the GeoIP helper; which in turn returns the visitor's IP address. <br>
</p>
<p>
	When you are using a Toolbox helper, it is often good practice to assign it to a variable first:<br>
	<code>
	$location = $this->toolbox('Geoip');
	</code><br><br>
	and then using it:<br>
	<code>
	$location->ip_address();
	</code><br>
	<code>
	$location->distance();
	</code><br>
	<code>
	$location->search_radius();
	</code><br>
</p>
<p> 
	By assigning the toolbox helpers to a variable, you are ensuring that particular helper is always pointing to the same resource/object.
</p>
<p>
	That's all there is to it! Every helper is used according to the above rules, to give you consistent access across the Toolbox.<br>
	Now that we know how to access the helpers, take a look below to learn more about what each helper does and how to use them in your application.
</p>
</div>
<p><br></p>
<div class="white-row">
    <legend><a id="helpers"><i class="fa fa-magic"></i> Toolbox Helpers</a></legend>
	
	<div class="row">
            <div class="col-md-4">
                <ul class="list-icon star color">

                <li><a href="<?= BASE_URL; ?>documentation/modules/user-agent">Browser Data</a></li>
                <li><a href="<?= BASE_URL; ?>documentation/modules/formatter">Formatter</a></li>
                <li><a href="<?= BASE_URL; ?>documentation/modules/validation">Form Validation</a></li>

                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-icon star color">
                <li><a href="<?= BASE_URL; ?>documentation/modules/geoip">GeoIP</a></li>
                <li><a href="<?= BASE_URL; ?>documentation/modules/notifications">Notifications</a></li>
                <li><a href="<?= BASE_URL; ?>documentation/modules/uploader">Image Uploader</a></li>

                </ul>
            </div>

            <div class="col-md-4">
                <ul class="list-icon star color">
                <li><a href="<?= BASE_URL; ?>documentation/modules/pagination">Pagination</a></li>
                <li><a href="<?= BASE_URL; ?>documentation/modules/hash">Password / Data Encryption</a></li>
                <li><a href="<?= BASE_URL; ?>documentation/modules/sessions">User authentication / Login</a></li>

                </ul>
            </div>
	</div>
</div>