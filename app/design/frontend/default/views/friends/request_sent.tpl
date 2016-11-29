{foreach $friends as $friend}
	<div class="alert alert-success" role="alert">
		Your friend request to <a href="{$smarty.const.BASE_URL}member/view/{$friend}">{$friend}</a> has been sent!
	</div>
{/foreach}