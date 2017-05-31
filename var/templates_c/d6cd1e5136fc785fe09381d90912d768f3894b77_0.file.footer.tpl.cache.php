<?php
/* Smarty version 3.1.30, created on 2017-05-31 15:51:35
  from "/var/www/html/diamond/app/design/frontend/default/views/footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592f1ec7b39222_51394287',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6cd1e5136fc785fe09381d90912d768f3894b77' => 
    array (
      0 => '/var/www/html/diamond/app/design/frontend/default/views/footer.tpl',
      1 => 1481151338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_592f1ec7b39222_51394287 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/var/www/html/diamond/vendor/smarty/libs/plugins/modifier.truncate.php';
$_smarty_tpl->compiled->nocache_hash = '1258451684592f1ec7aee6e3_61131340';
?>
				
				</div>
			</div>
		</div>
	</div>
	

	
	<footer id="footer">

		
		
		<div class="subfooter">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p>Page generated in <span style="color: green"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['script_exec_time']->value,6,'');?>
</span> secs 
						<span style="color: green">| <?php $_smarty_tpl->_assignInScope('milsec', $_smarty_tpl->tpl_vars['script_exec_time']->value*1000);
echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['milsec']->value,4,'');?>
 milliseconds</span><br>
            Memory Usage: <span style="color: green"><?php echo $_smarty_tpl->tpl_vars['actual_ram']->value;?>
</span>
            </p>
					</div>
					<div class="col-md-6">
						<nav class="navbar navbar-default" role="navigation">
							
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
									<li><a href="<?php echo @constant('BASE_URL');?>
">Home</a></li>
									<li><a href="https://github.com/arout/diamondphp">View on GitHub</a></li>
                                    <li><a href="<?php echo @constant('BASE_URL');?>
documentation/license">License</a></li>
                                    <li><a href="<?php echo @constant('BASE_URL');?>
documentation/faq">FAQ</a></li>
                                    <li><a href="<?php echo @constant('BASE_URL');?>
contact/support">Support</a></li>
                                    <li><a href="<?php echo @constant('BASE_URL');?>
contact/bugs">Report a Bug</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
		

	</footer>
	

</div>



<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/plugins/modernizr.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/plugins/isotope/isotope.pkgd.min.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/plugins/owl-carousel/owl.carousel.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/plugins/magnific-popup/jquery.magnific-popup.min.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/plugins/jquery.appear.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/plugins/jquery.countTo.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 src="<?php echo @constant('BASE_URL');?>
media/default/plugins/jquery.parallax-1.1.3.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 src="<?php echo @constant('BASE_URL');?>
media/default/plugins/jquery.validate.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/plugins/jquery.browser.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/plugins/SmoothScroll.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/js/template.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_URL');?>
media/default/js/custom.js"><?php echo '</script'; ?>
>

<link rel="stylesheet" href="<?php echo @constant('MODULES_URL');?>
datepicker/public/css/default.css" type="text/css">
<?php echo '<script'; ?>
 src="<?php echo @constant('MODULES_URL');?>
datepicker/public/javascript/zebra_datepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(document).ready(function() { 

    
    $('input.datepicker').Zebra_DatePicker( { 
      view: 'years'
     } );

 } );
<?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo @constant('MODULES_URL');?>
form-validation/dist/css/bootstrapValidator.css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('MODULES_URL');?>
form-validation/dist/js/bootstrapValidator.js"><?php echo '</script'; ?>
>




<?php echo '<script'; ?>
>
function request() { 

    setTimeout( function() { 

        $.ajax( { 

            url: "<?php echo @constant('BASE_URL');?>
block/check_new_messages",

            type:"post",
            data:"rid=<?php echo '/*%%SmartyNocache:1258451684592f1ec7aee6e3_61131340%%*/<?php echo \'<?=\';?>/*/%%SmartyNocache:1258451684592f1ec7aee6e3_61131340%%*/';?>
$this->session->get('member_id');<?php echo '/*%%SmartyNocache:1258451684592f1ec7aee6e3_61131340%%*/<?php echo \'?>\';?>/*/%%SmartyNocache:1258451684592f1ec7aee6e3_61131340%%*/';?>
",
            success:function(data) 
            { 
                if(data) { 

                    $("#new_message_alert").html(data);
                    
                    $.gritter.add({
                    
                    title: 'New Message',
                    
                    text: data,
                    sticky: true,
                    before_open: function(){
                            if($('.gritter-item-wrapper').length == 1)  
                            {
                                
                                return false; 
                            } 
                        } 
                    } );
                } 

            },
            
            complete: request()

        } );
     }, 5000); 
} 

request();

<?php echo '</script'; ?>
>




<?php echo '<script'; ?>
>
function update_unread_total( elemid ) { 
$.ajax( 
    { 

        url: "<?php echo @constant('MODULES_URL');?>
ajax/messenger/update_unread_count.php",

        type: "post",
        data: { rid:"<?php echo $_SESSION['member_id'];?>
" },
        success:function(response) 
        {
            $( "#" + elemid ).html(response); 
        } 
   } ); 
} 
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
  (function(i,s,o,g,r,a,m) { i['GoogleAnalyticsObject']=r;i[r]=i[r]||function() { 
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) 
  } )(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88230256-1', 'auto');
  ga('set', 'userId', { { <?php echo $_SESSION['member_id'];?>
 } } );
  ga('send', 'pageview');

<?php echo '</script'; ?>
>

<?php }
}
