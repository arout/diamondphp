{literal}
<style media="screen">
	pre {
		background-color: #242424;
		color: lime;
		font-size: 16px;
		font-family: "Lucida Console", Monaco, monospace;
	}
	h3 { color: #242424; background-color: lime; width: 25%; text-align: center; margin-left: auto; margin-right: auto; }
</style>
{/literal}

<pre>
<h3>DEBUG CONSOLE</h3>
>  <strong>MESSAGE: INVALID CONTROLLER CLASS NAME</strong>
>  <small>file: {$smarty.const.CONTROLLERS_PATH}{$controller}_Controller.php</small>
>
>  The controller file <span class="btn-danger">{$controller}_Controller.php</span> was found and loaded,
>  but contains an invalid class name.
>
>  Controller class names must match the file name (minus the .php file extension), 
>  and must also extend the core controller class.
>
>  To correct this error, open the controller file listed above, 
>  and edit class definition as follows:
>
>  <strong>&lt?php class {$controller}_Controller extends Hal\Controller\Base_Controller ?></strong>
>
>  View <a href="{$smarty.const.BASE_URL}documentation/mvc/controllers">the Controllers documentation</a> for more information.
</pre>