<h3>Email to a Friend</h3>

<form name="email_friend" method="post" class="ajax_form">
    <table>
        <tr><td>Name: </td> <td> <input type="text" name="name"></td></tr>
        <tr><td>Email: </td> <td> <input type="text" name="email"></td></tr>
        <tr><td>Friends Email: </td> <td> <input type="text" name="friends_email"></td></tr>
        <tr><td colspan="2">Message:<br>
            <textarea name="message" class="fancybox_textarea"></textarea></td></tr>
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