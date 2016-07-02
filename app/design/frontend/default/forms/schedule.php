<h3>Schedule Test Drive</h3>

<form name="schedule" method="post" class="ajax_form">
    <table>
        <tr><td>Name: </td> <td> <input type="text" name="name"></td></tr>
        <tr><td>Preferred Contact:</td> <td> <input type="radio" name="contact_method" value="email" id="schedule_email"><label for="schedule_email">Email</label>  <input type="radio" name="contact_method" value="phone" id="schedule_phone"> <label for="schedule_phone">Phone</label></td></tr>
        <tr><td>Email: </td> <td> <input type="text" name="email"></td></tr>
        <tr><td>Phone: </td> <td> <input type="text" name="phone"></td></tr>
        <tr><td>Best Day: </td> <td> <input type="text" name="best_day"></td></tr>
        <tr><td>Best Time: </td> <td> <input type="text" name="best_time"></td></tr>
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