<?php
namespace Web\Event;
use Hal\Core\Event;
use Web\Controller\Login_Controller;

class Login_Event extends Event
{
	const NAME = 'login.success';

    protected $login;

    public function __construct(Login_Controller $login)
    {
        $this->login = $login;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public static function hello($event)
	{
		echo "Hello, events!<br><br>";
		// print_r($event);
		// $this->log->save('login event worked', 'member.log');
	}
}