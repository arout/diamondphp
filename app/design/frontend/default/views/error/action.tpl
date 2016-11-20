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
>  <strong>MESSAGE: INVALID ACTION / METHOD DOES NOT EXIST</strong>
>  <small>file:   {$smarty.const.CONTROLLERS_PATH}{$controller}_Controller.php</small>
>  <small>action: {$action}</small>
>
>  The controller file {$controller}_Controller.php was found and loaded,
>  but the controller class does not contain the requested method:  <span class="btn-danger">{$action}</span>
>
>  To correct this error, open the controller file listed above, 
>  and create a method with the name <span class="btn-danger">{$action}</span>:
>
>  <strong>
>  &lt?php 
>  class {$controller}_Controller extends Hal\Controller\Base_Controller {ldelim}
>  
>      public function {$action}() {ldelim}
>          // Your code
>      {rdelim}
>
>  {rdelim}</strong>
>
>  ?> 
>
>  View <a href="https://diamondphp.com/documentation/mvc/controllers">the Controllers documentation</a> for more information.
</pre>