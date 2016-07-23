<div class="well">
Google reports that 1 in 10 online searches are dating related. The problem? Most online dating sites cater to people looking for love, yet the majority of people want sex, even those who are married. Fox News reports that 70 percent of married men admitted to cheating on their wives. That means that affairs are in high demand – so what about the women? Statistics found that about 50 to 60 percent of women admitted to having an affair over the course of their marriage. Whether you’re married or single, XXXies is the best place for likeminded adults who are looking for casual sex. Connect with adults in your area looking to hook up both online and off by browsing member profiles and using our unparalleled chat and video profile features. In a world where there are endless websites that advertise you’ll find love, there's only one site you need to find hook ups: XXXies. Sign up for free and see how easy it is to find sex online! 
</div>

<legend class="alternate-font text-center"><h1>Members Online Now</h1></legend>
<?php  if($data['profiles'] === FALSE ): ?>
    <div class="console">
        <div class="row">
            <div class="col-md-1"><i class="fa fa-5x fa-bug"></i></div>
            <div class="col-md-11 text-center">
                <h3><< Something went wrong >></h3>
                The requested member profile could not be found. That's all we know. <br><br>
                <?php if( isset( $_SERVER['HTTP_REFERER'] ) ) { ?>
                    <a style="margin-right: 20px" class="btn btn-success" href="<?= $_SERVER['HTTP_REFERER']; ?>">Go back to where you were</a>
                <?php } ?>
                    <a class="btn btn-primary" href="<?= BASE_URL; ?>">Go to home page</a>
            </div>
        </div>
    </div>
<?php else: ?>
    
    <div class="white-row">
    
    <?php foreach( $data['profiles'] as $user ): ?>
    
    <div class="row">
        <div class="col-md-12 text-center">

        <div class="car-block col-md-2">
            <div class="img-flex"> <a href="<?= BASE_URL; ?>member/view/<?= $user['username']; ?>"><span class="align-center"><i class="fa fa-3x fa-plus-square-o"></i></span></a> 
            <img src="<?= USER_PICS_URL; ?><?= $user['username']; ?>/<?= $user['pic']; ?>" alt="" class="img-responsive"> </div>
            <div class="car-block-bottom">
                <h6><strong><?= $user['username']; ?></strong></h6>
                <h6><?= $user['city']; ?>, <?= $user['state']; ?></h6>
                <h5 class="green">Online Now</h5>
            </div>
        </div>

        <div class="col-md-7">

        
        <div class="col-xs-12 xs-padding-bottom-40 xs-padding-left-none xs-padding-right-none sm-padding-bottom-40 fadeInUp" data-wow-delay=".2s">
            <div class="">

                        <blockquote class="style1">
                        <span><strong>Seeking: <span class="blue"><?= ucwords($user['looking_for']); ?></span><br>
                        <?= $user['about_me']; ?></span></blockquote>
            </div>
            <div class="clearfix"></div>
        </div>
        
        </div>
        <div class="col-md-3 text-right">
        <p style="padding-top: 11px">
            <a class="btn btn-info btn-block" href="<?= BASE_URL; ?>friends/request/<?= $user['username']; ?>"><i class="fa fa-plus-circle"></i> Add Friend</a>
            <a class="btn btn-success btn-block" href="<?= BASE_URL; ?>messenger/send/<?= $user['username']; ?>"><i class="fa fa-envelope"></i> Send Message</a>
            <a class="btn btn-warning btn-block" href="<?= BASE_URL; ?>member/block/<?= $user['username']; ?>"><i class="fa fa-ban"></i> Block</a>
            <a class="btn btn-danger btn-block" href="<?= BASE_URL; ?>member/block/<?= $user['username']; ?>"><i class="fa fa-exclamation-triangle"></i> Report Spam</a></p>
        </div>
        </div>
        
    </div>
    <hr class="margin-top10 margin-bottom10" />
    <div class="row">
        
    </div>
            <!-- <?php if( $data['img_gallery'] !== FALSE ): ?>
            <section class="container">
            <div class="row">
            <h4><?= $user['username']; ?>'s image gallery</h4>
            <ul class="lightbox nomargin-left list-unstyled" data-sort-id="isotope-list" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>
                <?php foreach( $data['img_gallery'] as $img ): ?>
                    
                    <li class="col-md-2 nomargin-left">
                        <div class="item-box">
                            <figure>
                                <a class="item-hover" href="<?= USER_PICS_URL.$user['username'].'/'; ?><?= $img['img_name']; ?>">
                                    <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-eye fsize20"></span>
                                        <strong>VIEW</strong> IMAGE
                                    </span>
                                </a>
                            <img class="img-responsive" src="<?= USER_PICS_URL.$user['username'].'/'; ?><?= $img['img_name']; ?>"alt="">
                            </figure>
                        </div>
                    </li>
                    
                <?php endforeach; ?>
            </ul>
            </div>
            </section>
            <?php endif; ?> -->

        
        
    <?php endforeach; ?>
    
    </div>
    
<?php endif; ?>