<legend>Manage system crontabs</legend>
<p>
	Cron is a daemon, which means that it only needs to be started once, and will 
	lay dormant until it is required. The cron daemon, or crond, stays dormant 
	until a time specified in one of the config files, or crontabs.
</p>
<p>
	On most Linux distributions crond is automatically installed and entered into 
	the start up scripts. To find out if it's running do the following command from your terminal (SSH / shell window):
</p>

<p><code>ps aux | grep crond</code></p>