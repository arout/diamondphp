{if $requests}

<div class="white-row">

	<form method="post" action="{$smarty.const.BASE_URL}friends/add/">
	<table class="table table-hover">
	<thead>
		<tr>
			<th>Sent By</th>
			<th>Date</th>
			<th>Accept</th>
			{* <th>Deny</th> *}
		</tr>
	</thead>

		{foreach $requests as $request}
			<tr>
				<td>{$request.username}</td> 
				<td>{$format->datetime($request.sent_date)}</td> 
				<td><input type="checkbox" id="accept" name="accept[]" value="{$request.username}"></td>
				{* <td><input type="checkbox" id="deny" name="deny[]" value="{$request.username}"></td> *}
			</tr>
		{/foreach}

		<tr>
			<td></td><td></td><td>
				<label for="acceptAll" class="btn btn-success text-center">Accept all requests
					<input type="checkbox" style="display:none" class="btn btn-success" id="acceptAll" name="acceptAll">
				</label>
			</td>
		</tr>
	</table>
	<input class="btn btn-info" type="submit" name="submit" value="Submit">
	</form>
</div>

<script>
	$("#acceptAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>

{else}

<div class="alert alert-danger">
	You have no pending friend requests
</div>

{/if}