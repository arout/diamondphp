</div>
</div>
</div>

<!-- footer start (Add "light" class to #footer in order to enable light footer) -->
            <!-- ================ -->
            <footer id="footer">

                <!-- .footer start -->
                <!-- ================ -->
                <div>
                    <!-- <div class="container">
                        <div class="row">
                            <div class="row">
                            <div class="col-xs-12">
                            <div style="width: 300px; margin-left: auto !important; margin-right: auto !important;">
                            <a href="<?= BASE_URL; ?>">
                                <img src="https://diamondphp.com/media/logo.png">
                                <!-- <span><?php echo $this->config->setting['site_slogan']; ?></span> 
                            </a>

                            </div>
                            </div>
                            <div class="space-bottom hidden-lg hidden-xs"></div>
                            
                        </div>
                        <div class="space-bottom hidden-lg hidden-xs"></div>
                    </div>

                </div>
                <p><br /><br /></p><p><br /><br /></p><p><br /><br /></p> -->
                <!-- .footer end -->

                <!-- .subfooter start -->
                <!-- ================ -->

                <div class="subfooter" style="position: relative; margin-top:150px; height: 150px; clear: both; padding-top: 20px;">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <p><a href="<?= BASE_URL; ?>"><img src="https://diamondphp.com/media/logo.png"></a><br>Copyright &copy; <?= date("Y"); ?>.  All rights reserved.</p>
                            </div>
                            <div class="col-md-6">
                                <nav class="navbar navbar-default" role="navigation">
                                    <!-- Toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>   
                                    <div class="collapse navbar-collapse" id="navbar-collapse-2">
                                        <ul class="nav navbar-nav">
                                            <li><a href="https://github.com/arout/diamondphp">View on GitHub</a></li>
                                            <li><a href="<?= BASE_URL; ?>documentation/license">License</a></li>
                                            <li><a href="<?= BASE_URL; ?>documentation/faq">FAQ</a></li>
                                            <li><a href="<?= BASE_URL; ?>contact/support">Support</a></li>
                                            <li><a href="<?= BASE_URL; ?>contact/bugs">Report a Bug</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .subfooter end -->

            </footer>
            <!-- footer end -->

        </div>
        <!-- page-wrapper end -->

        <!-- JavaScript files placed at the end of the document so the pages load faster
        ================================================== -->
        <!-- Jquery and Bootstap core js files -->
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>plugins/jquery.min.js"></script>
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>bootstrap/js/bootstrap.min.js"></script>

        <!-- Modernizr javascript -->
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>plugins/modernizr.js"></script>

        <!-- jQuery REVOLUTION Slider  -->
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <!-- Isotope javascript -->
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>plugins/isotope/isotope.pkgd.min.js"></script>

        <!-- Owl carousel javascript -->
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>plugins/owl-carousel/owl.carousel.js"></script>

        <!-- Magnific Popup javascript -->
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Appear javascript -->
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>plugins/jquery.appear.js"></script>

        <!-- Count To javascript -->
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>plugins/jquery.countTo.js"></script>

        <!-- Parallax javascript -->
        <script src="<?=TEMPLATE_URL;?>plugins/jquery.parallax-1.1.3.js"></script>

        <!-- Contact form -->
        <script src="<?=TEMPLATE_URL;?>plugins/jquery.validate.js"></script>

        <!-- SmoothScroll javascript -->
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>plugins/jquery.browser.js"></script>
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>plugins/SmoothScroll.js"></script>

        <!-- Initialization of Plugins -->
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>js/template.js"></script>
        
        <!-- Form validation -->
        <link rel="stylesheet" href="<?=MODULES_URL;?>form-validation/dist/css/bootstrapValidator.css"/>
        <script type="text/javascript" src="<?=MODULES_URL;?>form-validation/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=MODULES_URL;?>form-validation/dist/js/bootstrapValidator.js"></script>

        <?php # Date picker JS ?>
        <script src="<?= MODULES_URL; ?>datepicker/public/javascript/zebra_datepicker.js"></script>
        <link rel="stylesheet" href="<?= MODULES_URL; ?>datepicker/public/css/default.css" type="text/css">
        <script>
            $(document).ready(function() {

            // assuming the input elements you want to attach the plugin to
            // have the "datepicker" class set
            $('input.datepicker').Zebra_DatePicker({
              view: 'years'
            });

        });
        </script>
        <?php # END Date picker JS ?>
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
                url: "<?=BASE_URL;?>block/update_unread_count",
                type: "post",
                data: {rid:"<?=BASE_URL;?>block/update_unread_count"},
                success:function(response)
                {
                    $( "#" + elemid ).html(response);
                }
           });
        }
        </script>
         

        <!-- Custom Scripts -->
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>js/custom.js"></script>

    </body>
</html>