<?php
namespace Web\Controller;
use Hal\Controller\Base_Controller;

class Gallery_Controller extends Base_Controller {
	public function __construct($app) {
		parent::__construct($app);
	}

	public function index() {
		$$username   = $this->session->get('username');
		$profile     = $this->model('Member')->profile_data($$username);
		$member_id   = $this->model('Member')->get_member_id($$username);
		$img_gallery = $this->model('Member')->img_gallery($member_id);

		$this->template->assign("content", "gallery/index.tpl");
	}

}
