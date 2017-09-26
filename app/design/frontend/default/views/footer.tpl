				
				</div>
			</div>
		</div>
	</div>
	{* section end *}

	{* footer start (Add "light" class to #footer in order to enable light footer) *}
	<footer id="footer">

		{* .subfooter start *}
		{* ================ *}
		<div class="subfooter">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p>Page generated in <span style="color: green">{$script_exec_time|truncate:6:""}</span> secs 
						<span style="color: green">| {$milsec = $script_exec_time * 1000}{$milsec|truncate:4:""} milliseconds</span><br>
            Memory Usage: <span style="color: green">{$actual_ram}</span>
            </p>
					</div>
					<div class="col-md-6">
						<nav class="navbar navbar-default" role="navigation">
							{* Toggle get grouped for better mobile display *}
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
									<li><a href="{$smarty.const.BASE_URL}">Home</a></li>
									<li><a href="https://github.com/arout/diamondphp">View on GitHub</a></li>
                                    <li><a href="{$smarty.const.BASE_URL}documentation/license">License</a></li>
                                    <li><a href="{$smarty.const.BASE_URL}documentation/faq">FAQ</a></li>
                                    <li><a href="{$smarty.const.BASE_URL}contact/support">Support</a></li>
                                    <li><a href="{$smarty.const.BASE_URL}contact/bugs">Report a Bug</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
		{* .subfooter end *}

	</footer>
	{* footer end *}

</div>
{* page-wrapper end *}

{* Bootstap core js files *}
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/bootstrap/js/bootstrap.min.js"></script>

{* Modernizr javascript *}
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/plugins/modernizr.js"></script>

{* jQuery REVOLUTION Slider  *}
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

{* Isotope javascript *}
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/plugins/isotope/isotope.pkgd.min.js"></script>

{* Owl carousel javascript *}
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/plugins/owl-carousel/owl.carousel.js"></script>

{* Magnific Popup javascript *}
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

{* Appear javascript *}
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/plugins/jquery.appear.js"></script>

{* Count To javascript *}
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/plugins/jquery.countTo.js"></script>

{* Parallax javascript *}
<script src="{$smarty.const.BASE_URL}media/default/plugins/jquery.parallax-1.1.3.js"></script>

{* Contact form *}
<script src="{$smarty.const.BASE_URL}media/default/plugins/jquery.validate.js"></script>

{* SmoothScroll javascript *}
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/plugins/jquery.browser.js"></script>
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/plugins/SmoothScroll.js"></script>

{* Initialization of Plugins *}
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/js/template.js"></script>

{* Custom Scripts *}
<script type="text/javascript" src="{$smarty.const.BASE_URL}media/default/js/custom.js"></script>

<link rel="stylesheet" href="{$smarty.const.MODULES_URL}datepicker/public/css/default.css" type="text/css">
<script src="{$smarty.const.MODULES_URL}datepicker/public/javascript/zebra_datepicker.js"></script>
<script>
    $(document).ready(function() { 

    // assuming the input elements you want to attach the plugin to have the "datepicker" class set
    $('input.datepicker').Zebra_DatePicker( { 
      view: 'years'
     } );

 } );
</script>
<link rel="stylesheet" href="{$smarty.const.MODULES_URL}form-validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="{$smarty.const.MODULES_URL}form-validation/dist/js/bootstrapValidator.js"></script>



{* Check for new messages *}
{* 
<script>
function request() { 

    setTimeout( function() { 

        $.ajax( { 

            url: "{$smarty.const.BASE_URL}block/check_new_messages",

            type:"post",
            data:"rid={$smarty.session.member_id}",
            success:function(data) 
            { 
                if(data) { 

                    $("#new_message_alert").html(data);
                    /*
                     new PNotify({
                         title: 'New Message',
                         text: data
                     });
                    */
                    $.gritter.add({
                    /* (string | mandatory) the heading of the notification */
                    title: 'New Message',
                    /* (string | mandatory) the text inside the notification */
                    text: data,
                    sticky: true,
                    before_open: function(){
                            if($('.gritter-item-wrapper').length == 1)  /* Only allow one popup to be displayed at a time */
                            {
                                /* Returning false prevents a new gritter from opening */
                                return false; 
                            } 
                        } 
                    } );
                } 

            },
            /* Restart the function after response sent */
            complete: request()

        } );
     }, 5000); /* Check for new messages every 5 seconds */
} 
/* Initiate the request() function */
request();

</script>
 *}


{* Update unread message badges *}
<script>
function update_unread_total( elemid ) { 
$.ajax( 
    { 
        url: "{$smarty.const.BASE_URL}block/update_unread_count",

        type: "post",
        data: { rid:"{$smarty.session.member_id}" },
        success:function(response) 
        {
            $( "#" + elemid ).html(response); 
        } 
   } ); 
} 
</script>

{* <script>
  (function(i,s,o,g,r,a,m) { i['GoogleAnalyticsObject']=r;i[r]=i[r]||function() { 
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) 
  } )(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88230256-1', 'auto');
  ga('set', 'userId', { { {$smarty.session.member_id} } } );
  ga('send', 'pageview');

</script> *}

<script>

// Get the site base url
function base_url() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin+'/'+pathparts[1].trim('/')+'/';
    }else{
        var url = location.origin;
    }
    return url;
}

</script>
