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

<div class="sorting-filters">
    <div class="container">
        <form class="form-inline" method="post" action="">
            <div class="form-group">
                <label>Search</label>
                <select class="form-control" name="gender">
                    <option value="female" selected="selected">Women</option>
                    <option value="male">Men</option>
                    <option value="couple">Couples</option>
                </select>
            </div>
            <!-- <div class="form-group">
                <label>Order</label>
                <select class="form-control">
                    <option selected="selected">Acs</option>
                    <option>Desc</option>
                </select> 
            </div> -->
            <div class="form-group">
                <label>Ages</label>
                <div class="row grid-space-10">
                    <div class="col-sm-6">
                        <input type="number" name="min_age" min="18" max="99" placeholder="Min. Age" class="form-control col-xs-6">
                    </div>
                    <div class="col-sm-6">
                        <input type="number" name="max_age" min="18" max="99" placeholder="Max. Age" class="form-control col-xs-6">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Distance from me</label>
                <select class="form-control">
                    <option value="5" selected="selected">5 miles</option>
                    <option value="10">10 miles</option>
                    <option value="25">25 miles</option>
                    <option value="50">50 miles</option>
                    <option value="100">100 miles</option>
                    <option value="all">Any Distance/option>
                </select> 
            </div>
            <div class="form-group">
                <button name="search_filters" class="btn btn-default"> Search &nbsp;<i class='fa fa-search'></i></button>
            </div>
        </form>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row grid-space-20">

       <?php echo $data['pager']->paginate(); ?>

            <?php foreach( $data['profiles'] as $user ): ?>    
            <!-- section start -->
            <!-- ================ -->
            <div class="col-md-3" style="height: 320px; margin-bottom: 20px;">
                <div class="box-style-1 gray-bg" data-animation-effect="fadeInLeft" data-effect-delay="300">
                    <div class="overlay-container">
                        <img style="height: 180px; margin-right: auto; margin-left: auto;" src="<?= USER_PICS_URL; ?><?= $user['username']; ?>/<?= $user['pic']; ?>" alt="">
                        <a href="<?= BASE_URL; ?>member/view/<?= $user['username']; ?>" class="overlay small">
                            <i class="fa fa-plus"></i>
                            <span>View <?= $user['username']; ?>'s profile</span>
                        </a>
                    </div>
                    <h3><a href="<?= BASE_URL; ?>member/view/<?= $user['username']; ?>"><?= $user['username']; ?></a></h3>
                    <p><?= $user['headline']; ?></p>
                    <!-- <a class="btn btn-default" href="<?= BASE_URL; ?>friends/request/<?= $user['username']; ?>">Add Friend</a>
                    <a class="btn btn-default" href="<?= BASE_URL; ?>messenger/send/<?= $user['username']; ?>">Send Message</a>
                    <a class="btn btn-default" href="<?= BASE_URL; ?>member/block/<?= $user['username']; ?>">Block</a>
                    <a class="btn btn-default" href="<?= BASE_URL; ?>member/block/<?= $user['username']; ?>">Report Spam</a></p> -->
                </div>
            </div>
            <!-- section end -->
               
            <?php endforeach; ?>
        </div>
    </div>
</div>
        
<?php endif; ?>