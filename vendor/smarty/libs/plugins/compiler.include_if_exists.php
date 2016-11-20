<?php
/**
 * Smarty Plugin Compile Include If Exists for Smarty v3
 *
 * Compiles the {include_if_exists} tag
 *
 * Inspired by Liu Song's similar plugin for Smarty v2
 *
 * @see        http://code.google.com/p/smartyplugin-include-if-exists/
 *
 * @author     Attila Fulop
 * @author     Uwe Tews
 *
 * @version    2016-05-03
 *
 * @license    MIT
 * @example    {include_if_exists file="foo.tpl" else="default.tpl"}
 *
 */
class Smarty_Compiler_Include_If_Exists extends Smarty_Internal_CompileBase
{
	/**
	 * Instance of {include}  compiler
	 *
	 * @var Smarty_Internal_Compile_Include
	 */
	static $includeCompiler = null;
	/**
	 * Compiles code for the {include_if_exists} tag
	 *
	 * @param  array                                  $args      array with attributes from parser
	 * @param  Smarty_Internal_SmartyTemplateCompiler $compiler  compiler object
	 * @param  array                                  $parameter array with compilation parameter
	 *
	 * @throws SmartyCompilerException
	 * @return string compiled code
	 */
	public function compile($args, Smarty_Internal_SmartyTemplateCompiler $compiler, $parameter = null)
	{
		if (!isset(self::$includeCompiler))
		{
			self::$includeCompiler = new Smarty_Internal_Compile_Include();
		}
		// copy attribute settings from {include} compiler
		$this->required_attributes = self::$includeCompiler->required_attributes;
		$this->optional_attributes = self::$includeCompiler->optional_attributes;
		$this->option_flags        = self::$includeCompiler->option_flags;
		$this->shorttag_order      = self::$includeCompiler->shorttag_order;
		//check and get attributes
		$_attr        = $this->getAttributes($compiler, $args);
		$include_file = $_attr['file'];
		$include_else = isset($_attr['else']) ? $_attr['else'] : null;
		// 'else'attribute must not be passed to {include} compiler
		unset($_attr['else']);
		$new_args = array();
		foreach ($_attr as $key => $value)
		{
			$new_args[] = array($key => $value);
		}
		$output =
			"<?php \$___tpl = new Smarty_Internal_Template({$include_file}, \$_smarty_tpl->smarty, \$_smarty_tpl);\n";
		$output .= "if (\$___tpl->source->exists) {\n";
		$output .= "unset(\$___tpl);\n";
		$output .= "?>\n";
		$output .= self::$includeCompiler->compile($new_args, $compiler, $parameter);
		if (isset($include_else))
		{
			unset($_attr['file']);
			$new_args = array();
			foreach ($_attr as $key => $value)
			{
				$new_args[] = array($key => $value);
			}
			$new_args[] = array('file' => $include_else);
			$output .= "<?php } else {\n";
			$output .= "\$___tpl->template_resource = {$include_else};\n";
			$output .= "\$___tpl->source = Smarty_Resource::source(\$___tpl);\n";
			$output .= "if (\$___tpl->source->exists) {\n";
			$output .= "unset(\$___tpl);\n?>\n";
			$output .= self::$includeCompiler->compile($new_args, $compiler, $parameter);
			$output .= "<?php } else {\n";
			$output .= "unset(\$___tpl);\n";
			$output .= "}\n}\n?>\n";
			return $output;
		}
		$output .= "<?php } else {\n";
		$output .= "unset(\$___tpl);\n";
		$output .= "}\n?>\n";
		return $output;
	}
}