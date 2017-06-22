<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Codegenie_Controller extends Base_Controller
{
	private $controller_dir;
	private $model_dir;
	private $view_dir;
	private $controller_create_url;
	private $model_create_url;
	private $view_create_url;

	public function __construct($app)
	{
		parent::__construct($app);

		$this->controller_dir = CONTROLLERS_PATH;
		$this->model_dir = MODELS_PATH;
		$this->view_dir = VIEWS_PATH . '/';

		$this->controller_create_url = $app['config']->setting('site_url') . 'codegenie/submit_controller';
		$this->model_create_url = $app['config']->setting('site_url') . 'codegenie/submit_model';
		$this->view_create_url = $app['config']->setting('site_url') . 'codegenie/submit_view';

		$this->template->assign('submit_controller', $this->controller_create_url);
		$this->template->assign('submit_model', $this->model_create_url);
		$this->template->assign('submit_view', $this->view_create_url);
	}

	public function __toString()
	{
		return "Codegenie_Controller";
	}

	public function index()
	{
		$this->template->assign('content', 'codegenie/index.tpl');
	}

	public function create_controller()
	{
		$this->template->assign('data', $data);
		$this->template->assign('content', 'codegenie/controller.tpl');
	}

	# Process form submission to create new files
	public function submit_controller()
	{
		$data = $this->toolbox('sanitize')->xss($_POST);
		$controller = ucwords($data['controller_name']) ?? '';

		# Do validation check for special chars, spaces, numbers, etc first
		// if ()
		// {
		// 	$this->redirect('codegenie/create_controller/error/controller-illegal-chars');
		// 	exit;
		// }

		if (empty($controller))
		{
			$this->redirect('codegenie/create_controller/error/controller-empty');
			exit;
		}

		$file = new \SplFileObject("{$this->controller_dir}{$controller}_Controller.php", "w");
		$temp_assign = '';
		if ($data['create_view'] == 'on')
		{
			$temp_assign = '$this->template->assign("content", "index.tpl");';
		}
		$contents = <<<EOT
<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class {$controller}_Controller extends Base_Controller
{
	public function __construct(\$app)
	{
		parent::__construct(\$app);
		{$temp_assign}
	}

	public function index()
	{

	}

}

EOT;
		//chmod($this->controller_dir . $controller . '_Controller.php', octdec(0777));
		$written = $file->fwrite($contents);
		// echo "Wrote $written bytes to file";

		if ($data['create_model'] == 'on')
		{
			// Create model checkbox was selected; create a model
			$model_file = new \SplFileObject("{$this->model_dir}{$controller}Model.php", "w");

			$model_contents = <<<EOT
<?php

class {$controller}Model extends Hal\Model\System_Model
{

}

EOT;
			//chmod($this->controller_dir . $controller . '_Controller.php', octdec(0777));
			$model_written = $model_file->fwrite($model_contents);
			// echo "Wrote $model_written bytes to file";
		}

		if ($data['create_view'] == 'on')
		{
			// Create view checkbox was selected; create a view
			if (!is_dir($this->view_dir . strtolower($controller)))
			{
				mkdir($this->view_dir . strtolower($controller));
			}
			$controller = strtolower($controller);
			$view_file = new \SplFileObject("{$this->view_dir}{$controller}/index.tpl", "w");

			$view_contents = <<<EOT

EOT;
			//chmod($this->controller_dir . $controller . '_Controller.php', octdec(0777));
			$view_written = $view_file->fwrite($view_contents);
			// echo "Wrote $model_written bytes to file";
		}

		$this->template->assign('data', $data);
		$this->template->assign('content', 'codegenie/submit_controller.tpl');
	}

	# Process form submission to create new files
	public function submit_model()
	{
		$this->template->assign('content', 'codegenie/submit_model.tpl');
	}

	# Process form submission to create new files
	public function submit_view()
	{
		$this->template->assign('content', 'codegenie/submit_view.tpl');
	}
}
