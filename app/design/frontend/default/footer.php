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




<!-- <footer class="design_2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 padding-left-none md-padding-left-none sm-padding-left-15 xs-padding-left-15">
                <h4>newsletter</h4>
                <p>By subscribing to our company newsletter
                    you will always be up-to-date on our latest
                    promotions, deals and vehicle inventory!</p>
                <form method="post" action="#" class="form_contact">
                    <input type="text" value="" name="MERGE0" placeholder="Email Address">
                    <input type="submit" value="Subscribe" class="md-button">
                    <input type="hidden" name="u" value="">
                    <input type="hidden" name="id" value="">
                </form>
                </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h4>Latest tweets</h4>
                <div class="latest-tweet">
                    <div><i class="fa fa-twitter"></i>
                        <p>Put your tweet message here.  Make it
                            compelling to attract other <a href="#">@people</a> to
                            read and click on your <a href="#">http://links</a> to
                            your site. <a href="#">#hashtag</a></p>
                    </div>
                    <div><i class="fa fa-twitter"></i>
                        <p>Put your tweet message here.  Make it
                            compelling to attract other <a href="#">@people</a> to
                            read and click on your <a href="#">http://links</a> to
                            your site. <a href="#">#hashtag</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 padding-right-none md-padding-right-none sm-padding-right-15 xs-padding-right-15">
                <h4>Contact us</h4>
                <div class="footer-contact">
                    <ul>
                        <li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, AB 12345</li>
                        <li><i class="fa fa-phone"></i> <strong>Phone:</strong>1-800-123-4567</li>
                        <li><i class="fa fa-envelope-o"></i> <strong>Email:</strong><a href="#">sales@company.com</a></li>
                    </ul>

                    <i class="fa fa-location-arrow back_icon"></i>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="clearfix"></div>
<section class="copyright-wrap padding-bottom-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="logo-footer margin-bottom-20 md-margin-bottom-20 sm-margin-bottom-10 xs-margin-bottom-20"><a href="#">
                    <h1>Automotive</h1>
                    <span>template</span></a>
                </div>
                <p>Copyright &copy; 2014 Theme Suite.  All rights reserved.</p>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <ul class="social margin-bottom-25 md-margin-bottom-25 sm-margin-bottom-20 xs-margin-bottom-20 xs-padding-top-10 clearfix">
                    <li><a class="sc-1" href="#"></a></li>
                    <li><a class="sc-2" href="#"></a></li>
                    <li><a class="sc-3" href="#"></a></li>
                    <li><a class="sc-4" href="#"></a></li>
                    <li><a class="sc-5" href="#"></a></li>
                    <li><a class="sc-6" href="#"></a></li>
                    <li><a class="sc-7" href="#"></a></li>
                    <li><a class="sc-8" href="#"></a></li>
                    <li><a class="sc-9" href="#"></a></li>
                    <li><a class="sc-10" href="#"></a></li>
                    <li><a class="sc-11" href="#"></a></li>
                    <li><a class="sc-12" href="#"></a></li>
                </ul>
            </div>
        </div>
    </div>
    
</section>
 -->
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
<link rel="stylesheet" type="text/css" href="<?=MODULES_URL;?>gritter/css/jquery.gritter.css" />
<script type="text/javascript" src="<?=MODULES_URL;?>gritter/js/jquery.gritter.js"></script>

<!-- Form validation -->
<link rel="stylesheet" href="<?=MODULES_URL;?>form-validation/vendor/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" href="<?=MODULES_URL;?>form-validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?=MODULES_URL;?>form-validation/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=MODULES_URL;?>form-validation/dist/js/bootstrapValidator.js"></script>


<!-- Check for new messages 
<script>
function request() {

    setTimeout( function(){

        $.ajax({
            url: "<?=MODULES_URL;?>ajax/messenger/check_new_messages.php",
            type:"post",
            data:"rid=<?=$this->toolbox('session')->get('member_id');?>",
            success:function(data)
            {
                if(data) {

                    $("#new_message_alert").html(data);

                        $.gritter.add({
                        // (string | mandatory) the heading of the notification
                        title: 'New Message',
                        // (string | mandatory) the text inside the notification
                        text: data,
                        sticky: false,
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
-->


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

