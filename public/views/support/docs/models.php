<div class="white-row">
<h1>Working with Models</h1>

<p class="lead">
	Models act as the data storage unit in MVC. As we discussed in earlier chapters, it is important to maintain a seperation of concerns, assigning individual components it's own duties.
	As such, models interact directly with your database. The model will perform your sql query and return the result, from which your controllers and
	views can then access the data.
</p>

<legend><strong>Creating</strong> Models</legend>

<p>
When creating models, they will always extend the base class <samp>SystemModel</samp>:
</p>
<pre>
class WelcomeModel extends Hal\Core\SystemModel {

	// Do something

}
</pre>

<p>
Models must also follow a specific naming convention. The class name must start with a capital letter, and have the word Model appended to it (no spaces, underscores or any other seperators). <strong>The file containing the model follows the same naming convention.</strong> So in the example above, the class WelcomeModel would be contained in a file named WelcomeModel.php (located in /public/models folder by default).
</p>


<legend><strong>Loading</strong> Models</legend>
<p>
Loading models is very simple. Models can be loaded from inside a controller or view, and is done so with a with a simple call:
<pre>
// Load WelcomeModel
$this->model( 'Welcome' );
</pre>

<p>
The above would search the<code>/public/models</code> directory for a file named <strong>Welcome</strong>Model.php. Note that this would only load the model; it does not access or execute any of it's methods.
Typically, you would only use this in your controller __construct() by assigning it to a variable (i.e.  $model = $this->model( 'Welcome' )), if it all. You can load a model and access it's methods directly,
as shown below:
</p>

<pre>
	// Access "select" method from WelcomeModel.php
	$this->model( 'Welcome' )->select();
</pre>


<p>
Where select() is a method that could exist in the Welcome Model.
</p>

<p>
	Now we know how to load models, how do we display the data that it contains? <br>
	Let's suppose that our select() method from the example above contains the following code:
	<pre>
		public function select()
		{
			$query = "SELECT * FROM users";
			$result = $this->db->sql->prepare($query);
			$result->execute();

			return $result;
		}
	</pre>
</p>

<p>
	As you probably guessed, the above query simply selects all items from the users table. Take special note of the <code>return $result;</code> line above.
	That signifies that the results of the query is stored in an array. In other words, when you call<br>
	<strong>$this->model( 'Welcome' )->select()</strong> in your controller, it fetches the array contained in the select() method.
</p>

<p>
	Once we have the data, displaying it should be familiar to users of MySQL or PDO -- we simply print the array, typically with a foreach loop. Let's set up a full working example to see how everything works together.
</p>

<p>
	<h5>Inside our example controller</h5>
	<pre>
		$this->data['users'] = $this->model('welcome')->select();
	</pre>
</p>

<p>

	<h5>And then to display data in our view file</h5>
	<pre>
		&lt;?php foreach( $this->data['users'] as $users ): ?>
		&lt;div>
			&lt;strong>Username: &lt;?= $users['username']; ?>&lt;/strong><br>
			&lt;small>Real Name: &lt;?= $users['first_name'] . ' ' . $users['last_name']; ?>&lt;/small>
		&lt;/div>
		&lt;?php endforeach; ?>
	</pre>
</p>

</div>

<!--
<h5>select_one() built in method from KW_Model:</h5>

<?php foreach ($this->data['user'] as $user): ?>
<div class="white-row">
	<strong>Username: <?=$user['username'];?></strong><br>
	<small>Real Name: <?=$user['first_name'] . ' ' . $user['last_name'];?></small>
</div>
<?php endforeach;?>

<h5>User defined select() method from Welcome_Model:</h5>

<?php foreach ($this->data['users'] as $users): ?>
<div class="white-row">
	<strong>Username: <?=$users['username'];?></strong><br>
	<small>Real Name: <?=$users['first_name'] . ' ' . $users['last_name'];?></small>
</div>
<?php endforeach;?>
-->
