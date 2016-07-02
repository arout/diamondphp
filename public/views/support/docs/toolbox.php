<h1>Developer Toolbox</h1>

<p class="lead">
	The Toolbox is a handy collection of common developer tools that is used in creating additional functionality for websites. The Toolbox
	is simple to use, and comes loaded with features such as GeoIP location awareness, browser data (user agent), formatters for date/time/telephone numbers, 
	form validation, pagination and much more!
</p>

<legend><strong>Syntax and Basic Usage</strong></legend>
<p>
	The Toolbox is accessed by using the following class method call:<br>
	<code>Toolbox::helper(' name_of_tool ')</code><br>
	<em>* When calling a Toolbox helper from inside a namespaced file, you must prefix a backslash: &nbsp;<strong>\</strong>Toolbox::helper(' name_of_tool ')</em>
</p>
<p>
	Replace the <em>' name_of_tool '</em> with the specific helper that you wish to use, for example:<br>
	<code>Toolbox::helper(' Geoip ')</code><br>
	<em>* Toolbox helper names are always uppercase. To determine which helpers are available and the name to call them with, 
	view the /vendor/Fusion/Toolbox/ directory.</em>
</p>
<p>
	In the above example, we are accessing the GeoIP helper. To access data from the GeoIP helper, we would simply append the requested information
	to the end of the class call, like this:<br>
	<code>Toolbox::helper(' Geoip ')->ip_address</code>
</p>
<p>
	By appending <strong>->ip_address</strong>, we are telling the GeoIP helper to get us the visitor's IP address. <br>
</p>
<p>
	Toolbox helpers are also directly accessible from your controllers. Instead of using <code>Toolbox::helper('Geoip')->ip_address</code> in your controller,
	you can (and should) use <code>$this->toolbox('Geoip')->ip_address</code> instead.
</p>
<p>
	When you are using a Toolbox helper, it is often good practice to assign it to a variable first:<br>
	<code>
	$location = $this->toolbox('Geoip');
	</code><br><br>
	and then using it:<br>
	<code>
	$location->ip_address;
	</code><br>
	<code>
	$location->distance();
	</code><br>
	<code>
	$location->search_radius();
	</code><br>
</p>
<p> 
	Toolbox helpers are simple class files, and each time that you call <code>Toolbox::helper(' name_of_tool ')</code> or 
	<code>$this->toolbox('Geoip')->ip_address</code>, you are creating a new helper object. 
	By assigning the toolbox helpers to a variable, you are ensuring that particular helper is always pointing to the same resource/object.
</p>
<p>
	That's all there is to it! Every helper is used according to the above rules, to give you consistent access across the Toolbox.<br>
	Now that we know how to access the helpers, take a look below to learn more about what each helper does and how to use them in your application.
</p>

<div class="white-row">
	<legend><i class="fa fa-magic"></i> Toolbox Helpers</legend>
	
	<div class="row">
					<div class="col-md-4">
						<ul class="list-icon star color">
							
							<li><a href="<?= BASEURL; ?>support/docs/toolbox/useragent">Browser Data</a></li>
							<li><a href="<?= BASEURL; ?>support/docs/toolbox/formatter">Formatter</a></li>
							<li><a href="<?= BASEURL; ?>support/docs/toolbox/validation">Form Validation</a></li>
							
						</ul>
					</div>
					<div class="col-md-4">
						<ul class="list-icon star color">
							<li><a href="<?= BASEURL; ?>support/docs/toolbox/geoip">GeoIP</a></li>
							<li><a href="<?= BASEURL; ?>support/docs/toolbox/notifications">Notifications</a></li>
							<li><a href="<?= BASEURL; ?>support/docs/toolbox/uploader">Image Uploader</a></li>
							
						</ul>
					</div>

					<div class="col-md-4">
						<ul class="list-icon star color">
							<li><a href="<?= BASEURL; ?>support/docs/toolbox/pagination">Pagination</a></li>
							<li><a href="<?= BASEURL; ?>support/docs/toolbox/hash">Password / Data Encryption</a></li>
							<li><a href="<?= BASEURL; ?>support/docs/toolbox/sessions">User authentication / Login</a></li>
							
						</ul>
					</div>
				</div>
</div>