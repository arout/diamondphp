{include file=$sidebar}

<fieldset>
	<legend>Overriding Controllers and Models</legend>

	<p>
		Generally speaking, it should be rare that you ever need to override any of your controllers or models. Overriding is primarily made available for creating 
		your own custom plugins (as well as third party plugin developers) that work with <em>existing</em> controllers.
	</p>

	<p>
		An example of a plugin working with existing controllers could be the Messenger controller. The <code>send()</code> method is used to deliver new messages; if you wanted to send an email notification of the new message, you can create a plugin that listens for the message.send event, and sends out an email notifying the recipient of the new message (see <a href="https://diamondphp.com/documentation/core/events">Events</a> for more information about events).
	</p>

	<p>
		
	</p>

</fieldset>