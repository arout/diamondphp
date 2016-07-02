<?php  if($data['profile'] === FALSE ): ?>
    <div class="console">
        <div class="row">
            <div class="col-md-1"><i class="fa fa-5x fa-bug"></i></div>
            <div class="col-md-11 text-center">
                <h3><< Something went wrong >></h3>
                The requested member profile could not be found. That's all we know. <br><br>
                <?php if( isset( $_SERVER['HTTP_REFERER'] ) ) { ?>
                    <a style="margin-right: 20px" class="btn btn-success" href="<?= $_SERVER['HTTP_REFERER']; ?>">Go back to where you were</a>
                <?php } ?>
                    <a class="btn btn-primary" href="<?= BASEURL; ?>">Go to home page</a>
            </div>
        </div>
    </div>
<?php else: ?>
    
    <div class="white-row">
    
    <?php foreach( $data['profile'] as $user ): ?>
    
    <div class="row">
        <div class="col-md-12 text-center">
        <div class="col-md-2">
            <img class="img-responsive" height="200px" src="<?= USER_PICS_URL.$user['username'].'/'; ?><?= $user['pic']; ?>" />
        </div>
        <div class="col-md-7">
        <h4><strong><?= $user['username']; ?></strong></h4>
            <?= $user['city']; ?>, <?= $user['state']; ?><br>
            <?php if( ! is_null( $user['personal_website'] ) ): ?>
                <a href="<?= $user['personal_website']; ?>" target="_blank"><?= $user['personal_website']; ?></a>
            <?php else: ?>
                <a class="btn-facebook radius3" href="<?= $user['facebook_page']; ?>" target="_blank">
                <i class="fa fa-facebook"></i> View <?= $user['username']; ?> on Facebook </a>
            <?php endif; ?>
        </div>
        <div class="col-md-3 text-right">
        <p style="padding-top: 11px">
            <a class="btn btn-info btn-block" href="<?= BASEURL; ?>friends/request/<?= $user['username']; ?>"><i class="fa fa-plus-circle"></i> Add Friend</a>
            <a class="btn btn-success btn-block" href="<?= BASEURL; ?>messenger/send/<?= $user['username']; ?>"><i class="fa fa-envelope"></i> Send Message</a>
            <a class="btn btn-warning btn-block" href="<?= BASEURL; ?>member/block/<?= $user['username']; ?>"><i class="fa fa-ban"></i> Block</a>
            <a class="btn btn-danger btn-block" href="<?= BASEURL; ?>member/block/<?= $user['username']; ?>"><i class="fa fa-exclamation-triangle"></i> Report Spam</a></p>
        </div>
        </div>
        
    </div>
    <hr class="margin-top10 margin-bottom10" />
    <div class="row">
        
    </div>
            <?php if( $data['img_gallery'] !== FALSE ): ?>
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
            <?php endif; ?>

        
        
    <?php endforeach; ?>
    
    </div>
    
<?php endif; ?>