{include file=$sidebar}
{include file=$layout}

	<p>
		Controllers follow a few simple conventions:
	</p>
	<p>
		<li>Uses the Web\Controller namespace</li>
		<li>Extends the Base_Controller class</li>
		<li>Stored inside the <code>/public/controllers</code> directory</li>
	</p>
	<p>
		Additionally, the class name must match the file name containing the controller. Let's look at some boilerplate controller setup:
	</p>
	<p>
<pre class="prettyprint">
# file: /public/controllers/Example_Controller.php

&lt;?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Example_Controller extends Base_Controller
{
	// Do stuff
}
</pre>
	</p>

	<p>
		As we can see from the above code, we: 
		<br>- created a file in <code>/public/controllers</code> named Example_Controller.php
		<br>- named the class <samp>Example_Controller</samp> to match the file name
		<br>- put it in the <code>Web\Controller</code> namespace
		<br>- and imported the Base_Controller class and extended it with our example class.
	</p>
	<p>
		That is all there is to it, we now have a controller that we can use and begin adding functionality to!
	</p>
	<div class="alert alert-info">
		<em>Note: The example controller above would map to the following URL: http://yoursite.com/example</em>
	</div>

	<p>
		<legend style="width: auto;">URL Structure</legend>
		Controller methods, actions and $_GET parameters are called via the URL.
		<p>The URL structure would thus look like this:</p>
		<p>http://yoursite.com/controller/action/parameter1</p>
		<p>
		For more information on URLs and parameters, visit the <a href="{$smarty.const.BASE_URL}documentation/core/router" target="_blank">Router documentation</a>.
		</p>
	</p>

	<p>
		<legend style="width: auto;">Default Controller</legend>
		If no controller is specified in the URL (e.g., http://yoursite.com/), by default, the framework will fall back to the <code>Home_Controller</code>. You can change the default controller in your <samp>.env</samp> configuration file.
	</p>

	<p>
		<legend style="width: auto;">Default Action</legend>
		If no action is specified in the URL, the controller will fall back to the <code>index()</code> method in your controller, so it is recommended that each controller contains an <code>index()</code> method, otherwise, the visitor will be redirected to the 404 error page.
	</p>
	<p>
		<legend style="width: auto;">Class Constructors</legend>
		There will be times where you wish to apply default functionality to all methods in your controller. For example, if you view the Member_Controller, you will see that it checks that a user is logged in before allowing access to any profile information. Typically, this is done from within the <code>__construct()</code> method of your class.<br>
		When using the <code>__construct()</code> method in your controller classes, you must first call the parent construct, passing the App factory along with it, before implementing your code:<br>
		<code>parent::__construct($app);</code>
	</p>
	<p>
		Lets set a default message in our Example_Controller via the class constructor:
	</p>

<pre class="prettyprint">
# file: /public/controllers/Example_Controller.php

&lt;?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Example_Controller extends Base_Controller
{
	public $message;

	public function __construct($app)
	{
		parent::__construct($app);
		$this->message = "Hello, Bob!";
	}
}
</pre>
	
	<p>
		<legend style="width: auto;">Accessing the Database</legend>
		Generally, it is good practice to avoid making database calls from your controller; you'll want to create your queries inside your models, and access that model instead. There may be circumstances where you need to access a database table within your controllers directly, and you can do so using the <code>$this->db</code> function call. 
		See the <a href="{$smarty.const.BASE_URL}documentation/core/database" target="_blank">Database documentation</a> for more information on usage.
	</p>

	<p>
		<legend style="width: auto;">Accessing the Developer Toolbox</legend>
		The Developer Toolbox provides many useful features, such as form validation, session management, member management and much, much more. Visit the <a href="{$smarty.const.BASE_URL}documentation/modules/overview" target="_blank">Toolbox documentation</a> for more information on usage and available features.
	</p>

	<p>
		<legend style="width: auto;">Redirects</legend>
		To redirect a visitor to another page, you can use the following function call:<br>
		<code>$this->redirect('controller/action');</code><br>
		<p>
			Replace "controller" with the controller name, without the _Controller segment. "Action" specifies which class method is executed for that controller.
		</p>
		<p>
			So, to redirect a visitor from another section of the website to our Example page found above, we would place the following code in one of the methods in our controller:
		</p>
		<p>
			<code>$this->redirect('example/index');</code>
		</p>
	</p>

	<p>
		<legend style="width: auto;">Overriding Controllers</legend>
		DiamondPHP offers the ability to override controllers. Generally speaking, it should be rare that you ever need to override any of your controllers or models. Overriding is primarily made available for creating your own custom plugins (as well as third party plugin developers) that work with existing controllers. Visit the <a href="{$smarty.const.BASE_URL}documentation/core/override" target="_blank">Class Overrides documentation</a> for more information on usage.
	</p>

{include file=$layout_close}