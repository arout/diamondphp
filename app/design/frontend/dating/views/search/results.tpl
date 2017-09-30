{literal}
<style>
tr { display: block; float: left; }
th, td { display: block; }
</style>
{/literal}

{nocache}
<h1>SEARCH RESULTS</h1>

{foreach $user.username as $member}

	{* Highlighting search keywords causes problems with profile links when keyword is in username. Make sure to remove <span> tags *}
	<a href="{$smarty.const.BASE_URL}member/view/{$member.username|replace:'<span style=\'background-color: yellow;\'>':''|replace:'</span>':''}">
		<h4>{$member.username}</h4>
		<small>{$member.city}, {$member.state}<br></small>  
		{$member.about_me}<br>
	</a>

{/foreach}
{/nocache}