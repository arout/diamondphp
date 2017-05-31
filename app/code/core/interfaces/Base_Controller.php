<?php
namespace Hal\Interfaces;

/*
 * File:    /app/code/core/system/base_controller.php
 * Purpose: Base class from which all controllers extend
 */

interface Base_Controller
{
	public function __construct($app);

	public function parse();

	public function model($model);

	public function redirect($url);

	public function session();

	public function toolbox($helper);
}
