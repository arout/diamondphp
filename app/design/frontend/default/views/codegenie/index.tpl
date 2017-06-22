<h3>Introduction to the Code Genie</h3>
<p>
	Creating web pages with DiamondPHP (and other MVC frameworks) requires you to create a controller and view file for each page, at minimum, and most pages will need a model as well. This results in well structured code that enforces the separation of concerns, but also tends to have the side effect of a lot of basic boilerplate code being written.
</p>
<p>
	As an example, in the DiamondPHP framework, each controller file must use the <code>Web\Controller</code> namespace, as well as extend the system's <code>Base_Controller</code>. Controllers must also conform to the naming and location conventions specified elsewhere in the documentation.<br>
	In addition, it is highly advised that each controller class has  <code>index()</code> method as well.<br>
	If you wish to process data and interact with the database, you will need a model. Every model also has specific naming and location conventions, and extends the system's <code>System_Model</code> class.<br>
	Finally, if you wish to display that data to the user, you'll need a view file. You guessed it -- view files also need to be stored in a specific location, and if you followed the advice given in the Views documentation, you will have organized those folders according to their corresponding controllers.
</p>
<p>
	None of this is particularly difficult, but it does require you to do a bit of set up for each page, and that can become tedious and time consuming.
</p>
<p>
	The Code Genie takes care of all that boilerplate code needed to create web pages.
</p>