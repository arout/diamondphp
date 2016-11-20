{if ! $profile}

    <div class="console">
        <div class="row">
            <div class="col-md-1"><i class="fa fa-5x fa-bug"></i></div>
            <div class="col-md-11 text-center">
                <h3><< Something went wrong >></h3>
                The requested member profile could not be found. That's all we know. <br><br>
                <a class="btn btn-primary" href="{$smarty.const.BASE_URL}">Go to home page</a>
            </div>
        </div>
    </div>

{else}
    
    <div class="white-row">
    
    {foreach $profile as $user }

        <div class="main col-md-12">

            <!-- page-title start -->
            <!-- ================ -->
            <h1 class="page-title margin-top-clear">{$user.username}</h1>
            <!-- page-title end -->
            <div class="row">
                <div class="col-md-6">
                    <h3>{$user.headline}</h3>
                    <div class="separator-2"></div>
                    <p>{$user.about_me}</p>
                    <p style="padding-top: 11px">
                        <a class="btn btn-info btn-sm" href="{$smarty.const.BASE_URL}friends/request/{$user.username}"><i class="fa fa-plus-circle"></i> Add Friend</a>
                        <a class="btn btn-success btn-sm" href="{$smarty.const.BASE_URL}messenger/send/{$user.username}"><i class="fa fa-envelope"></i> Send Message</a>
                        <a class="btn btn-warning btn-sm" href="{$smarty.const.BASE_URL}member/block/{$user.username}"><i class="fa fa-ban"></i> Block</a>
                        <a class="btn btn-danger btn-sm" href="{$smarty.const.BASE_URL}member/block/{$user.username}"><i class="fa fa-exclamation-triangle"></i> Report Spam</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills white space-top" role="tablist">
                        <li class="active"><a href="#portfolio-images" role="tab" data-toggle="tab" title="images"><i class="fa fa-camera pr-5"></i> Photo</a></li>
                        <li><a href="#portfolio-video" role="tab" data-toggle="tab" title="video"><i class="fa fa-video-camera pr-5"></i> Video</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content clear-style">
                        <div class="tab-pane active" id="portfolio-images">
                            <div class="owl-carousel content-slider-with-controls">
                                {foreach $img_gallery as $img}
                                <div class="overlay-container">
                                    <img src="{$smarty.const.USER_PICS_URL}{$user.username}/{$img.img_name}" alt="">
                                    <a href="{$smarty.const.USER_PICS_URL}{$user.username}/{$img.img_name}" class="popup-img overlay" title="{$user.username}"><i class="fa fa-search-plus"></i></a>
                                </div>
                                {/foreach}
                            </div>
                        </div>
                        <div class="tab-pane" id="portfolio-video">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="//player.vimeo.com/video/29198414?byline=0&amp;portrait=0"></iframe>
                                <p><a href="http://vimeo.com/29198414">Introducing Vimeo Music Store</a> from <a href="http://vimeo.com/staff">Vimeo Staff</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <h3>Details</h3>
                    <ul class="list">
                        <li><span style="width: 65px;"><strong class="vertical-divider">Location</strong></span> {$user.city}, {$user.state}</li>
                        <li><span style="width: 65px;"><strong class="vertical-divider">Age</strong></span> {$current_age}</li>
                        <li><span style="width: 65px;"><strong class="vertical-divider">Orientation</strong></span> {$user.sexual_orientation}</li>
                        <li><span style="width: 65px;"><strong class="vertical-divider">Gender</strong></span> {$user.gender|capitalize}</li>
                        <li><span style="width: 65px;"><strong class="vertical-divider">Looking for a</strong></span> {$user.seek_gender|capitalize}</li>
                        <li><span style="width: 65px;"><strong class="vertical-divider">Interested in</strong></span> {$user.looking_for}</li>
                    </ul>
                </div>
                <div class="col-md-3 col-xs-6">
                    <h3>Share This</h3>
                    <div id="share"></div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <h3>Send {$user.username} a Message</h3>
                    <form role="form" action="{$smarty.const.BASE_URL}/messenger/send/{$user.username}">
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                            <i class="fa fa-envelope-o form-control-feedback"></i>
                        </div>
                        <a href="#" class="btn btn-white margin-top-clear">Send</a>
                    </form>
                </div>
            </div>
        </div>
    {/foreach}
    
    </div>
    
{/if}