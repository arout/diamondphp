<?php
namespace Fusion\Toolbox;

class Environment{
	
	public $os;
	public $browser;
	
	function browser(){
	
		$this->browser=$_SERVER['HTTP_USER_AGENT'];
	
		if (strpos($this->browser, 'Firefox')) 
			return $this->browser = "Firefox";	
		elseif (strpos($this->browser, 'MSIE 7.0'))
			return $this->browser = "Internet Explorer 7";
		elseif (strpos($this->browser, 'MSIE 8.0'))
			return $this->browser = "Internet Explorer 8";
		elseif (strpos($this->browser, 'MSIE 9.0'))
			return $this->browser = "Internet Explorer 9";
		elseif (strpos($this->browser, 'MSIE 6.5'))
			return $this->browser = "Internet Explorer 6.5";
		elseif (strpos($this->browser, 'MSIE 6.0'))
			return $this->browser = "Interner Explorer 6";
		elseif (strpos($this->browser, 'MSIE 5.0'))
			return $this->browser = "Internet Explorer 5";
		elseif (strpos($this->browser, 'MSIE 10.0'))
			return $this->browser = "Internet Explorer 10";
		elseif (strpos($this->browser, 'rv:11.0'))
			return $this->browser = "Internet Explorer 11";
		elseif (strpos($this->browser, 'rv:12.0'))
			return $this->browser = "Internet Explorer 12";
		elseif (strpos($this->browser, 'Chrome'))
			return $this->browser = "Google Chrome";
		elseif (strpos($this->browser, 'Presto'))
			return $this->browser = "Opera";
		elseif (strpos($this->browser, 'Safari'))
			return $this->browser = "Safari";
		else
			return $this->browser = "Other";
	}
	
	function os() { 
	
		$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
		$regex = $user_agent;
	
			if (strpos($regex, 'Windows NT 6.3')) 
				return $regex = "Windows 8.1";
			elseif (strpos($regex, 'Windows NT 6.2')) 
				return $regex = "Windows 8";
			elseif (strpos($regex, 'Windows NT 6.1')) 
				return $regex = "Windows 7";
			elseif (strpos($regex, 'Windows NT 6.0')) 
				return $regex = "Windows Vista";
			elseif (strpos($regex, 'Windows NT 5.2')) 
				return $regex = "Windows Server 2003 / XP 64";
			elseif (strpos($regex, 'Windows NT 5.1')) 
				return $regex = "Windows XP";
			elseif (strpos($regex, 'Windows XP')) 
				return $regex = "Windows XP";
			elseif (strpos($regex, 'Macintosh|Mac OS X')) 
				return $regex = "Mac OS X";
			elseif (strpos($regex, 'Mac_PowerPC')) 
				return $regex = "Mac OS 9";
			elseif (strpos($regex, 'Linux')) 
				return $regex = "Linux";
			elseif (strpos($regex, 'Ubuntu Linux')) 
				return $regex = "Linux Ubuntu";
			elseif (strpos($regex, 'iPhone')) 
				return $regex = "iPhone";
			elseif (strpos($regex, 'iPod')) 
				return $regex = "iPod";
			elseif (strpos($regex, 'iPad')) 
				return $regex = "iPad";
			elseif (strpos($regex, 'Android')) 
				return $regex = "Android";
			elseif (strpos($regex, 'BlackBerry')) 
				return $regex = "BlackBerry";
			elseif (strpos($regex, 'WebOS')) 
				return $regex = "Mobile";
			else
				return $regex = "Unknown / unsupported operating system";
	
	}

}

// Build Environment helper
\Toolbox::register('Environment', function() {
	
	return new Environment;
});