<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Cron_Controller extends Base_Controller
{

	private $ip_address;

	public function __construct($app)
	{
		parent::__construct($app);
		$this->ip_address = $this->toolbox('geoip')->ip();

		# IPv4 and IPv6 addresses that are allowed access to cron management
		# Multiple addresses allowed in each array, separated by comma. Example:
		# 'v4' => [ '73.187.22.165', '24.565.94.118', '66.864.33.142' ],
		# 'v6' => [ '2601:983:801:d4f3:5db6:3c7d:3329:ac44', '4472:983:801:d4f3:5db6:3c7d:3329:dd99', '1801:983:801:d4f3:5db6:3c7d:3329:bd20' ]
		# Only an IPv4 or IPv6 address is needed, but you can enter both if you wish
		$whitelist =
			[
			'v4' => [''],
			'v6' => [''],
		];

		if (!in_array($this->ip_address, $whitelist['v4']) &&
			!in_array($this->ip_address, $whitelist['v6']))
		{
			return $this->redirect('error/_404');
		}

	}

	public function index()
	{
		# View existing cronjobs
		$data['existing'] = $this->cron->view_cronjobs();
		$this->template->assign('existing', $data['existing']);
		return $this->template->assign('content', 'cron/index.tpl');
	}

}
