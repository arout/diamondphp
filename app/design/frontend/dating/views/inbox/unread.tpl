{$count_unread}
{if $count_unread >= 1}
<div class="white-row">
<legend>Unread Messages</legend>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr><th>From</th><th>Subject</th><th>Date</th><th></th></tr>
        <tbody>
        {foreach $unread_messages as $mail}
        <tr>
            <td width="15%">
            <a href="{$smarty.const.BASE_URL}member/view/{$mail['sender']}" />
                <img class="img-responsive" width="50px" src="{$smarty.const.USER_PICS_URL}/{$mail['username']}/{$mail['pic']}" />
                {$mail['sender']}
            </a>
            </td>
            <td width="55%"><h4>{$mail['subject']}</h4></td>
            <td width="20%">{$format->datetime( {$mail['date']} )}</td>
            <td width="10%"><a href="{$smarty.const.BASE_URL}inbox/view/{$mail['mid']}" /><button class="label btn-success">View</button></a></td>
        </tr>

        {/foreach}
        </tbody>
    </table>
</div>

</div>

{else}

<div class="alert alert-info">
    You have no unread messages
</div>

{/if}