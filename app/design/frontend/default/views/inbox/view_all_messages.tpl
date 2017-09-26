<div class="white-row">
   <div class="row">
      <div class="col-md-9">
         <small>
         <em>
         You are allowed to store up to {$inbox_limit} messages in your inbox. 
         Once your limit has been reached, the oldest message will be deleted to make room for each new one.
         </em>
         </small>
      </div>
      <div class="col-md-3 text-right">
         <table class="table table-striped table-condensed" align="right">
            <tr>
               <td><strong>{$count_all}</strong></td>
               <td>total messages</td>
            </tr>
            <tr>
               <td>
                  <strong>
                     <div id="total_unread_messages">
                        {$count_unread}
                     </div>
                  </strong>
                  <div id="unread_messages_badge"></div>
               </td>
               <td>unread messages</td>
            </tr>
         </table>
      </div>
   </div>
   <div id="inbox" class="row" style="padding: 6px; width: 98%; margin-left: 1%">
      <div class="table-responsive">
         <table class="table table-hover tablesorter" id="function_table">
            <thead>
               <tr>
                  <th></th>
                  <th></th>
                  <th width="20px" class="text-center">Date Sent</th>
                  <th width="20px" class="text-center">Delete</th>
                  <th width="20px" class="text-center">Flag Important</th>
               </tr>
            </thead>
            <tbody>
               {foreach $all_messages as $mail}
               {$rid eq $mail['rid']}
               <form name="messenger">
               <tr id="{$mail.mid}">
                  <td>
                     <a href="{$smarty.const.BASE_URL}member/view/{$mail.sender}">
                     <img src="{$smarty.const.USER_PICS_URL}{$mail.username}/{$mail.pic}" width="64px !important" />
                     <br>
                     {$mail.sender}
                     </a>
                  </td>
                  <td>
                     <h4> 
                        <a href="{$smarty.const.BASE_URL}inbox/view/{$mail.mid}" style="text-decoration: none;">
                            {$mail.subject} <br>
                            <small><em>{$mail.message|truncate:100}</em></small>
                        </a> 
                     
                  </td>
                  <td align="center">{* <i class="{if $mail['flag_read'] eq '0'} fa fa-envelope {else} fa fa-envelope-o {/if} read" name="mid_{$mail['rid']}" id="read_{$mail.mid}" style="cursor: pointer"></i> *}
                  {if $mail['flag_read'] eq '0'} 
                    <a href="{$smarty.const.BASE_URL}inbox/view/{$mail.mid}"><span class="btn btn-success">New Message!<br>{$format->datetime( $mail.date )}</span></a>
                  {else}
                    <em>
                        {$format->datetime( $mail.date )}
                     </em>
                  {/if}
                  </td>
                      <td align="center">
                        <h2><i class="fa fa-trash-o delete" id="{$mail.mid}" style="cursor: pointer"></i></h2>
                      </td>
                  <td align="center" id="stars"><h2><i name="{$mail.mid}" 
                     {if $mail['flag_star'] eq 'star_0'} class="fa fa-star-o important" {else} class="fa fa-star red important" {/if}
                     id="star_{$mail.mid}" style="cursor: pointer"></i></h2>
                  </td>
               </tr>
               {/foreach}
            </tbody>
         </table>
      </div>
   </div>
</div>
<script>
   /** 
    *  Delete and hide selected message
    *  This looks for an element with a CSS class "delete", 
    *  takes the message_id value from the element on click,    
    *  submits the message_id (mid) to the public/plugins/ajax/del_message.php
    *  script, and then hides the table row containing the id="mid"
    */
   
   $(document).ready(function() 
   { 
       $(".delete").click(function()
       { 
           var del_id = $(this).attr('id');
           $.ajax(
           { 
               url:'{$smarty.const.BASE_URL}inbox/flag_delete',
               type:"post",
               data:'mid='+del_id,
               success:function(data)
               {
                   if(data) {
                       document.getElementById(del_id).style.display = 'none'
                   }
                   else {
                       document.getElementById(del_id).style.display = 'none'
                   }
               }
           } ); 
       } ); 
   } ); 
</script>



{* Mark selected message as important *}
<script>
   $(document).ready(function() 
   { 
       $(".important").click(function()
       { 
           var star_id = $(this).attr('id');
           var star_name = $(this).attr('name');
           $.ajax(
           { 
               url:'{$smarty.const.BASE_URL}inbox/flag_important',
               type:"post",
               data:'mid='+star_id,
               success:function(data)
               {
                   if(data) { 
                       $("#" + star_id).toggleClass('fa-star red').toggleClass('fa-star-o');
                   } 
               } 
           } ); 
       } ); 
   } ); 
</script>
{* Add gritter notification when message deleted *}
<script>
   $(document).ready(function() 
   { 
       $.gritter.add({ 
                   // (string | mandatory) the heading of the notification
                   title: 'Demo popup on page load',
                   // (string | mandatory) the text inside the notification
                   text: 'Review the <code>view_all_messages.php</code> view file in the messenger folder for more information and code sample on how it\'s done.'
               } ); 
   
       return false;
   } ); 
</script>
