{include file=$sidebar}
<div class="white-row">

	<h1>Event Listeners</h1>
	<p class="lead">
		During execution of the framework, many event notifications are triggered. For example, in the Messenger portion of the framework, when a new message is sent from one user to another, an event notification is sent to the event dispatcher, which alerts the recipient of the message. If you have used Magento or WordPress (or many other software or CMS), you may know these as observers or hooks.
	</p>
	<p>
		<em>Diamond PHP implements the <a href="http://symfony.com/doc/current/components/event_dispatcher/introduction.html" target="_blank">Symfony Event Dispatcher</a> for you to observe system events, and to create your own events and listeners.</em>
	</p>
	<br>
	<legend style="width: auto;"><strong>Creating</strong> Events</legend>
	<p>
		Creating your own events and listeners is handled within the controller classes.
	</p>

</div>