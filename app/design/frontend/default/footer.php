        <p><br><br></p>
        <!-- Close main content -->
        </div>
            <div
              class="fb-like"
              data-href="https://diamondphp.com" 
              data-share="false" 
              data-size="large" 
              data-width="250"
              data-show-faces="false">
            </div>
            <div class="fb-share-button" data-href="https://diamondphp.com" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdiamondphp.com%2F&amp;src=sdkpreparse">Share</a></div>
        </span>
        <a class="toTop" href="#topNav">BACK TO TOP <i class="fa fa-arrow-circle-up"></i></a>
    <div class="copyright-wrap pull-right">
        <span class="copyright">
        <!-- <div class="fb-like" data-href="https://diamondphp.com/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div> -->
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '595301233972425',
              xfbml      : true,
              version    : 'v2.6'
            });
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        </script>
    </div>
    </div>
</section>
<br>

<div class="clearfix"></div>
<section class="copyright-wrap no_footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-footer margin-bottom-15 md-margin-bottom-15 sm-margin-bottom-10 xs-margin-bottom-15">
                <a href="<?= BASE_URL; ?>">
                    <h1><?php echo $this->config->setting['site_name']; ?></h1>
                    <span><?php echo $this->config->setting['site_slogan']; ?></span>
                </a>

                    <p>Copyright &copy; <?= date("Y"); ?>.  All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bar">
    <div class="footer-bar">
        <div class="container text-center"> Script execution time: <code class="terminal"><?php echo $this->config->setting['execution_time']; ?></code> seconds. Memory usage: <code class="terminal">
            <?php
                function convert($size) {

                    $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
                    return round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
                }

                echo convert(memory_get_peak_usage(true)); // 123 kb
            ?>
            </code> <br />
            <small>Diamond PHP is licensed and distributed under GNU GENERAL PUBLIC LICENSE v3 by <a href="https://twitter.com/arout77">Andrew Rout</a><br />
            <a class="terminal" href="<?=BASE_URL;?>documentation/license">Learn more</a></small> </div>
    </div>
</div>
</section>

<div class="back_to_top"> <img src="<?=TEMPLATE_URL;?>images/arrow-up.png" alt="scroll up" /> </div>


<!-- Bootstrap core JavaScript -->

<script src="<?=TEMPLATE_URL;?>js/retina.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>js/jquery.parallax.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>js/jquery.inview.min.js"></script>
<script src="<?=TEMPLATE_URL;?>js/main.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>js/jquery.fancybox.js"></script>
<script src="<?=TEMPLATE_URL;?>js/modernizr.custom.js"></script>
<script defer src="<?=TEMPLATE_URL;?>js/jquery.flexslider.js"></script>
<script src="<?=TEMPLATE_URL;?>js/jquery.bxslider.js" type="text/javascript"></script>
<script src="<?=TEMPLATE_URL;?>js/jquery.selectbox-0.2.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>js/jquery.easing.js"></script>

<?php # Gritter ?>
<link rel="stylesheet" type="text/css" href="<?=TEMPLATE_URL;?>css/pnotify.custom.css" />
<script type="text/javascript" src="<?=TEMPLATE_URL;?>js/pnotify.custom.js"></script>

<!-- Form validation -->
<link rel="stylesheet" href="<?=MODULES_URL;?>form-validation/vendor/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" href="<?=MODULES_URL;?>form-validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?=MODULES_URL;?>form-validation/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=MODULES_URL;?>form-validation/dist/js/bootstrapValidator.js"></script>


<!-- Check for new messages -->
<script>
function request() {

    setTimeout( function(){

        $.ajax({
            url: "<?=BASE_URL;?>block/check_new_messages",
            type:"post",
            data:"rid=<?=$this->session->get('member_id');?>",
            success:function(data)
            {
                if(data) {

                    $("#new_message_alert").html(data);

                    // new PNotify({
                    //     title: 'New Message',
                    //     text: data
                    // });

                    $.gritter.add({
                    // (string | mandatory) the heading of the notification
                    title: 'New Message',
                    // (string | mandatory) the text inside the notification
                    text: data,
                    sticky: true,
                    before_open: function(){
                            if($('.gritter-item-wrapper').length == 1) // Only allow one popup to be displayed at a time
                            {
                                // Returning false prevents a new gritter from opening
                                return false;
                            }
                        }
                    });
                }

            },
            // Restart the function after response sent
            complete: request()

        });
    }, 5000); // Check for new messages every 5 seconds
}
// Initiate the request() function
request();

</script>



<!-- Update unread message badges -->
<script>
function update_unread_total( elemid ) {
$.ajax(
    {
        url: "<?=MODULES_URL;?>ajax/messenger/update_unread_count.php",
        type: "post",
        data: {rid:"<?php echo $this->toolbox('session')->get('member_id'); ?>"},
        success:function(response)
        {
            $( "#" + elemid ).html(response);
        }
   });
}
</script>
 
<?php
# Fetch JS functions. Stored in js.php to clean up footer code
include_once 'js.php';
?>


<!-- FOOTER CONTACT INFO
                <div class="column col-md-4">
                    <h3>Current Software Version <br>
                        <small>Release version
                        <?=$this->config->setting['software_version'];?>
                    </h3>
                    <p class="contact-desc"><i class="fa fa-download"></i> <a>Download kW Fusion</a> </p>
                    <address class="font-opensans">
                    <ul>
                        <i class="fa fa-cloud"></i> <strong>Previous versions</strong>
                        </li>
                        <li> N/A </li>
                    </ul>
                    </address>
                </div>
                <!-- /FOOTER CONTACT INFO -->

                <!-- FOOTER LOGO
                <div class="column logo col-md-4 text-center">
                    <div class="logo-content">
                        <h3>Follow</h3>
                        <img class="animate_fade_in" src="<?=TEMPLATE_URL;?>images/logo/logo.png" width="200" alt="" />
                        <h4 style="font-family: Audiowide">FRAMEWORK</h4>
                        <a href="https://www.facebook.com/kwfusion" class="social fa fa-facebook"></a> <a href="https://twitter.com/kw_fusion" class="social fa fa-twitter"></a> <a href="#" class="social fa fa-google-plus"></a> </div>
                </div>
                <!-- /FOOTER LOGO -->
</body>
</html>

<?php ob_end_flush(); ?>

