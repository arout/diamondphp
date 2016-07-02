<h3>Request More Info</h3>

<form name="request_info" method="post" class="ajax_form">
    <table>
        <tr><td>Name: </td> <td> <input type="text" name="name"></td></tr>
        <tr><td>Preferred Contact:</td> <td> <input type="radio" name="contact_method" value="email" id="offer_email"><label for="offer_email">Email</label>  <input type="radio" name="contact_method" value="phone" id="offer_phone"> <label for="offer_phone">Phone</label></td></tr>
        <tr><td>Email: </td> <td> <input type="text" name="email"></td></tr>
        <tr><td>Phone: </td> <td> <input type="text" name="phone"></td></tr>
        <?php
		
		if(isset($_GET['recaptcha'])){			
			echo "<tr><td colspan='2'><br><div id='recaptcha'></div></td></tr>";
		}
		
		?>
        <tr><td colspan="2"><input type="submit" value="Submit" class="pull-left"></td></tr>
    </table>
</form>

<?php if(isset($_GET['recaptcha'])){ ?>
<script type="text/javascript">
grecaptcha.render("recaptcha", {
    'sitekey': '6Ld5necSAAAAAMNoodwSDBwEWAQi3Yd3VHHSsZnr',
    'theme': "red",
    'callback': grecaptcha.focus_response_field
});
</script>
<?php } ?>