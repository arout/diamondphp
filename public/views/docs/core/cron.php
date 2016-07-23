<legend style="width: auto;">What is cron?</legend>
<p>
	Cron is a daemon, which means that it only needs to be started once, and will 
	lay dormant until it is required. The cron daemon, or crond, stays dormant 
	until a time specified in one of the config files, or crontabs.
</p>
<p>
	On most Linux distributions crond is automatically installed and entered into 
	the start up scripts. To find out if it's running do the following command from your terminal (SSH / shell window):
</p>

<p><span class="terminal">ps aux | grep crond</span></p>

<p>If crond is running, it will return something similar to the below:</p>

<p><span class="terminal">7823907  15243  0.0  0.0   4216   640 pts/0    SN+  16:33   0:00 grep crond</span></p>

<p>
	If it isn't running, and you have root access to the server, just add the line crond to one of your start up scripts. The 
	process automatically goes into the background, so you don't have to force it with &. Cron will be started next time you reboot. To run cron without rebooting, just type crond as root:
</p>

<p><span class="terminal">sudo crond</span></p>

<p>Note that you'll need to run cron manually with each reboot unless you add it to the system startup scripts.</p>

<p>If you do not have root access to your server, you'll need to contact your web host to have it enabled.</p>

<p><br></p>

<legend style="width: auto;">Managing cronjobs</legend>

<p>
	The documentation will cover only the web based cron management system packaged with the framework, since console usage is the same (generally) across all systems.
</p>

<p>
	The cron web interface is located at http://your-website.com/cron/.
</p>

<p>
	Beware that before using this feature, you will need to whitelist your IP address, otherwise you will not be able to access the page at all.
</p>

<p>http://ipv4.whatismyv6.com/</p>