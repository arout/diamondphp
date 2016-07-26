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

<div class="section">
    <div class="container">
        <div class="row grid-space-20">
        <?php 
            echo $data['pager']->paginate(); 
        ?>
            <?php foreach( $data['profiles'] as $user ): ?>    
            <!-- section start -->
            <!-- ================ -->
            <div class="col-md-4">
                <div class="box-style-1 white-bg object-non-visible" data-animation-effect="fadeInLeft" data-effect-delay="300">
                    <div class="overlay-container">
                        <img style="height: 200px; margin-right: auto; margin-left: auto;" src="<?= USER_PICS_URL; ?><?= $user['username']; ?>/<?= $user['pic']; ?>" alt="">
                        <a href="<?= BASE_URL; ?>member/view/<?= $user['username']; ?>" class="overlay small">
                            <i class="fa fa-plus"></i>
                            <span>View <?= $user['username']; ?>'s profile</span>
                        </a>
                    </div>
                    <h3><a href="<?= BASE_URL; ?>member/view/<?= $user['username']; ?>"><?= $user['username']; ?></a></h3>
                    <p><?= $user['headline']; ?></p>
                    <a class="btn btn-default" href="<?= BASE_URL; ?>friends/request/<?= $user['username']; ?>">Add Friend</a>
                    <a class="btn btn-default" href="<?= BASE_URL; ?>messenger/send/<?= $user['username']; ?>">Send Message</a>
                    <a class="btn btn-default" href="<?= BASE_URL; ?>member/block/<?= $user['username']; ?>">Block</a>
                    <a class="btn btn-default" href="<?= BASE_URL; ?>member/block/<?= $user['username']; ?>">Report Spam</a></p>
                </div>
            </div>
            <!-- section end -->
               
            <?php endforeach; ?>
        </div>
    </div>
</div>
        
<?php endif; ?>