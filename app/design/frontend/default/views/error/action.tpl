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
<h3 class="animated object-visible fadeInUp">DEB<i class="fa fa-bug fa-sm"></i>G CONSOLE</h3>
>  <strong>MESSAGE: INVALID ACTION / METHOD DOES NOT EXIST</strong>
>  <small>file:   {$controller_path}</small>
>  <small>action: {$action}</small>
>
>  The controller file {$controller}_Controller.php was found and loaded,
>  but the controller class does not contain the requested method:  <span class="btn-danger">{$action}</span>
>
>  To correct this error, open the controller file listed above, 
>  and create a method with the name <span class="btn-danger">{$action}</span>:
>
>  <strong>
>   public function {$action}() {ldelim}
>   	// Your code
>   {rdelim}
>   </strong>
>
>  View <a href="{$smarty.const.BASE_URL}documentation/mvc/controllers">the Controllers documentation</a> for more information.
</pre>