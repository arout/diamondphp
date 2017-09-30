{include file=$sidebar}
{include file=$layout}

	<p>
		Models follow a specific naming convention. The class name must start with a capital letter, and have the word Model appended to it (no spaces, underscores or any other seperators). <strong>The file containing the model follows the same naming convention.</strong> So in the example below, the class <samp>WelcomeModel</samp> would be contained in a file named <samp>WelcomeModel.php</samp> (located in <code>/public/models</code> folder by default).
	</p>
	<p>
		When creating models, they will always extend the base class <samp>System_Model</samp>:
	</p>
<pre class="prettyprint">
class WelcomeModel extends Hal\Model\System_Model {
	// Do something
}
</pre>
	<legend style="width: auto;"><strong>Loading</strong> Models</legend>
	<p>
		Loading models is very simple. Models can be loaded from inside a controller with a simple function call:
<pre class="prettyprint">
// Load WelcomeModel
$this->model( 'Welcome' );
</pre>
	<p>
		The above would search the<code>/public/models</code> directory for a file named <strong>Welcome</strong>Model.php. Note that this would only load the model; it does not access or execute any of it's methods. Often, you could use this in your controller <samp>__construct()</samp> by assigning it to a variable (i.e.  <code>$model = $this->model( 'Welcome' )</code>). You can load a model and access it's methods directly, as shown below:
	</p>
<pre class="prettyprint">
// Access "select" method from WelcomeModel.php
$this->model( 'Welcome' )->select();
</pre>
	<p>
		Where <samp>select()</samp> is a method that could exist in the Welcome Model.
	</p>
	<p>
		Now we know how to load models, how do we display the data that it contains? <br>
		Let's suppose that our <samp>select()</samp> method from the example above contains the following code:
<pre class="prettyprint">
public function select()
{
	$query = "SELECT * FROM user_table";
	$result = $this->db->prepare($query);
	$result->execute();

	return $result;
}
</pre>
	</p>
	<p>
		As you probably guessed, the above query simply selects all items from the users table. Take special note of the <code>return $result;</code> line above.
		That signifies that the results of the query is stored in an array. In other words, when you call 
		<code>$this->model( 'Welcome' )->select()</code> in your controller, it fetches the array contained in the <samp>select()</samp> method.
	</p>
	<p>
		Once we have the data, displaying it should be familiar to users of MySQLi or PDO -- we simply print the array, typically within a loop. Let's set up a full working example to see how everything works together.
	</p>
	<p>
	<samp>In our example controller</samp>
<pre class="prettyprint">
// Fetch the array containing all of our users
$users = $this->model('welcome')->select();

// Pass the $users array to Smarty
$this->template->assign('members', $users);
</pre>
	</p>
	<p>
	<samp>And then in our view file</samp>
<pre class="prettyprint">
&#123;foreach $members as $member}
&lt;div>
	Username: &#123;$member['username']}
	Real Name: &#123;$member['first_name']} &#123;$member['last_name']}
	City: &#123;$member['city']}
	State: &#123;$member['state']}
	Zip Code: &#123;$member['zip_code']}
&lt;/div>
&#123;/foreach}
</pre>
	</p>

<h4>More information</h4>
Visit the <a href="{$smarty.const.BASE_URL}documentation/mvc/controllers" target="_blank">Controllers documentation</a> and <a href="{$smarty.const.BASE_URL}documentation/mvc/views" target="_blank">Views documentation</a> to learn more about controllers and views.
</div>

{include file=$layout_close}