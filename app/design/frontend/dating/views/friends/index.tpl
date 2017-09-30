{if $friends}

<h1>Friends</h1>
<div class="section clearfix">
    <div class="container">
        <div class="row grid-space-20">
            {foreach $friends as $friend}

                <div class="col-lg-6 col-md-12">
                    <div class="image-box team-member option-3">
                        <div class="overlay-container">
                            <img src="{$smarty.const.USER_PICS_URL}{$friend.username}/{$friend.pic}" alt="">
                            <div class="overlay">
                                <ul class="social-links colored clearfix">
                                    <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                    <li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
                                    <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="image-box-body">
                            <h3 class="title">{$friend.username}</h3>
                            <small>{$friend.headline}</small>
                            <div class="separator-2"></div>
                            <p>{$friend.about_me}</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-phone pr-10"></i>+12 123 456 7912</li>
                                <li><i class="fa fa-mobile pr-10 pl-5"></i>+12 123 456 7912</li>
                                <li><i class="fa fa-envelope pr-10"></i> Friend since {$format->datetime($friend.accepted_date)}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            {/foreach}
        </div>
        <div class="space"></div>
    </div>
</div>

{else}    

    <legend>No friends to display</legend>
    <p>
        To add someone to your friends list, view their profile, and select the "Add Friend" button.
    </p>
    
{/if}
