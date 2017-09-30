<div>
    
<script src="{$smarty.const.MODULES_URL}ckeditor/ckeditor.js"></script>

<form action="{$smarty.const.BASE_URL}documents/process" method="post" role="form">


    <div class="row white-row styleBackground" style="border-radius: 0 !important;">

    {foreach $recipient_info as $info}    
    <div class="col-xs-12 col-md-3">
		<div class="item-box">
			<figure>
				<a class="item-hover" href="{$smarty.const.BASE_URL}member/view/{$recipient}">
					<span class="overlay color2"></span>
					<span class="inner">
						<span class="block fa fa-plus fsize20"></span>
						<strong>VIEW</strong> PROFILE
					</span>
				</a>
				<img class="img-responsive" src="{$smarty.const.USER_PICS_URL}{$info.username}/{$info.pic}" width="260" height="260" alt="{$info.username}">
			</figure>
			<div class="item-box-desc">
				<h4 class="black">{$recipient}</h4>
				<small class="styleColor">
				    <span class="pull-left">{$info.city}, {$info.state}</span> 
				    <span class="pull-right">{$age} years old</span>
				</small>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-9">
	{if $history neq FALSE}
		<pre style="margin-top: 20px"><legend class="white">Message History</legend>
		{foreach $history as $previous}
		<span class="pull-left"><i class="fa fa-envelope"></i> <a href="{$smarty.const.BASE_URL}messenger/view/{$previous.mid}">
		{$previous.subject}</a></span><span class="pull-right">{$date}</span> 
		{/foreach}
		</pre>
	{/if}
	</div>

	{/foreach}
	<div class="row white-row" style="margin-top: -30px !important;">

	<div class="input-group">
	     <span class="input-group-addon"><span style="font-size: 21px; font-weight: bold; letter-spacing: 1px;">Subject</span></span>
	     <input type="text" class="form-control" id="document_title" name="document_title" placeholder="Message subject" required=required />
	</div>

	<br>

	<textarea name="document" id="document" rows="10" cols="80" required=required /></textarea>
	<script>
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace( 'document' );
	</script>
	<br><br>

	<button class="btn btn-success pull-right" data-loading-text="Saving..."><i class="fa fa-2x fa-rocket"></i> <span style="font-size: 2em">Send</span></button>

	</form>
	</div>
	</div>
    </div>
