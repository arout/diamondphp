<div class="section default-bg">
{if $added neq 0}
<h2 class="text-center">The following members have been added to your friends list</h2>
{foreach $added as $add}
	{$add}<br>
{/foreach}
{/if}

{if $denied neq 0}
You have declined friend requests from the following member(s):<br>
{foreach $denied as $deny}
	{$deny}<br>
{/foreach}
{/if}
</div>