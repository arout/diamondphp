<?php 
namespace Hal\Core;

class Cron 
{

	public function view_cronjobs() 
	{
		$view = exec('crontab -l');
		if( !empty ($view) && !is_null($view) )
			return $view;
		return false;
	}

	# Check if cron exists
	public function cronjob_exists( $command ) 
	{
	    $cronjob_exists = FALSE;
	    exec('crontab -l', $crontab);

	    if( isset($crontab) && is_array($crontab) )
	    {
	        $crontab = array_flip( $crontab );

	        if( isset( $crontab[$command] ) )
	        {
	            $cronjob_exists = TRUE;
	        }
	    }
	    return $cronjob_exists;
	}

	# Append a new cronjob
	public function append_cronjob( $command ) 
	{
	    if( is_string( $command ) && !empty( $command ) && cronjob_exists( $command ) === FALSE ) 
	    {
	        # add job to crontab
	        $output = shell_exec('echo -e "`crontab -l`\n'.$command.'" | crontab -');
	    	return $output;
	    }
	}

	public function remove_crontab( $crontab ) 
	{
		return exec('crontab -r', $crontab);
	}

}