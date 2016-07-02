<h3>Trade-In</h3>

<form name="trade_in" method="post" class="ajax_form">
	<table class="left_table">
    	<tr>
        	<td colspan="2"><h4>Contact Information</h4></td>
        </tr>
    	<tr>
        	<td>First Name<br><input type="text" name="first_name"></td>
        	<td>Last Name<br><input type="text" name="last_name"></td>
        </tr>
        <tr>
        	<td>Work Phone<br><input type="text" name="work_phone"></td>
        	<td>Phone<br><input type="text" name="phone"></td>
        </tr>
        <tr>
        	<td>Email<br><input type="text" name="email"></td>
            <td>Preferred Contact<br>  <input type="radio" name="contact_method" value="email" id="email"> <label for="email">Email</label>  <input type="radio" name="contact_method" value="phone" id="phone"> <label for="phone">Phone</label> </td>
        </tr>
        <tr>
        	<td colspan="2">Comments<br><textarea name="comments" style="width: 89%;" rows="5"></textarea></td>
        </tr>
	</table>
    
    <table class="right_table">
    	<tr>
        	<td colspan="2"><h4>Options</h4></td>
        </tr>
        
        <tr>
        	<td> <input type="checkbox" name="navigation" value="yes" id="option_1"> <label for="option_1">Navigation</label></td>
            <td> <input type="checkbox" name="sunroof" value="yes" id="option_2"> <label for="option_2">Sunroof</label></td>
        </tr>
        <tr>
        	<td> <input type="checkbox" name="leather" value="yes" id="option_3"> <label for="option_3">Leather</label></td>
            <td> <input type="checkbox" name="air_conditioning" value="yes" id="option_4"> <label for="option_4">Air Conditioning</label></td>
        </tr>
    </table>
    
    <div style="clear:both;"></div>
    
    <table class="left_table">    
    	<tr><td colspan="2"><h4>Vehicle Information</h4></td></tr>
        
        <tr>
        	<td>Year<br><input type="text" name="year"></td>
        	<td>Make<br><input type="text" name="make"></td>
        </tr>
        <tr>
        	<td>Model<br><input type="text" name="model"></td>
        	<td>Exterior Colour<br><input type="text" name="exterior_colour"></td>
        </tr>
        <tr>
        	<td>VIN<br><input type="text" name="vin"></td>
        	<td>Kilometres<br><input type="text" name="kilometres"></td>
        </tr>
        <tr>
        	<td>Engine<br><input type="text" name="engine"></td>
        	<td>Doors<br><div class="styled"><select name="doors"><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div></td>
        </tr>
        <tr>
        	<td>Transmission<br><div class="styled"><select name="transmission"><option value="Automatic">Automatic</option><option value="Manual">Manual</option></select></div></td>
        	<td>Drivetrain<br><div class="styled"><select name="drivetrain"><option value="2WD">2WD</option><option value="4WD">4WD</option><option value="AWD">AWD</option></select></div></td>
        </tr>
    
    </table>
       
    <table class="right_table">
    	<tr><td colspan="2"><h4>Vehicle Rating</h4></td></tr>
        
        <tr>
        	<td>Body (dents, dings, rust, rot, damage)<br><div class="styled"><select name="body_rating"><option value="10">10 - best</option><option value="9">9</option><option value="8">8</option><option value="7">7</option><option value="6">6</option><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1 - worst</option></select></div></td>
            <td>Tires (tread wear, mismatched)<br><div class="styled"><select name="tire_rating"><option value="10">10 - best</option><option value="9">9</option><option value="8">8</option><option value="7">7</option><option value="6">6</option><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1 - worst</option></select></div></td>
        </tr>
        <tr>
        	<td>Engine (running condition, burns oil, knocking)<br><div class="styled"><select name="engine_rating"><option value="10">10 - best</option><option value="9">9</option><option value="8">8</option><option value="7">7</option><option value="6">6</option><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1 - worst</option></select></div></td>
            <td>Transmission / Clutch (slipping, hard shift, grinds)<br><div class="styled"><select name="transmission_rating"><option value="10">10 - best</option><option value="9">9</option><option value="8">8</option><option value="7">7</option><option value="6">6</option><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1 - worst</option></select></div></td>
        </tr>
        <tr>
        	<td>Glass (chips, scratches, cracks, pitted)<br><div class="styled"><select name="glass_rating"><option value="10">10 - best</option><option value="9">9</option><option value="8">8</option><option value="7">7</option><option value="6">6</option><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1 - worst</option></select></div></td>
            <td>Interior (rips, tears, burns, faded/worn, stains)<br><div class="styled"><select name="interior_rating"><option value="10">10 - best</option><option value="9">9</option><option value="8">8</option><option value="7">7</option><option value="6">6</option><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1 - worst</option></select></div></td>
        </tr>
        <tr>
        	<td colspan="2">Exhaust (rusted, leaking, noisy)<br><div class="styled"><select name="exhaust_rating"><option value="10">10 - best</option><option value="9">9</option><option value="8">8</option><option value="7">7</option><option value="6">6</option><option value="5">5</option><option value="4">4</option><option value="3">3</option><option value="2">2</option><option value="1">1 - worst</option></select></div></td>
        </tr>
    </table>
    
    <div style="clear:both;"></div>
    
    <table class="left_table">
    	<tr><td><h4>Vehicle History</h4></td></tr>
        
        <tr>
        	<td>Was it ever a lease or rental return? <br><div class="styled"><select name="rental_return"><option value="Yes">Yes</option><option value="No">No</option></select></div></td>
        </tr>
        <tr>
        	<td>Is the odometer operational and accurate? <br><div class="styled"><select name="odometer_accurate"><option value="Yes">Yes</option><option value="No">No</option></select></div></td>
        </tr>
        <tr>
        	<td>Detailed service records available? <br><div class="styled"><select name="service_records"><option value="Yes">Yes</option><option value="No">No</option></select></div></td>
        </tr>
    </table>
    
    <table class="right_table">
    	<tr>
        	<td><h4>Title History</h4></td>
        </tr>
        
        <tr>
        	<td>Is there a lienholder? <br><input type="text" name="lienholder"></td>
        </tr>
        <tr>
        	<td>Who holds this title? <br><input type="text" name="titleholder"></td>
        </tr>
    </table>
    
    <div style="clear:both;"></div>
           
    <table style="width: 100%;">
    	<tr><td colspan="2"><h4>Vehicle Assessment</h4></td></tr>
        
        <tr>
        	<td>Does all equipment and accessories work correctly?<br><textarea name="equipment" rows="5" style="width: 89%;"></textarea></td>
            <td>Did you buy the vehicle new?<br><textarea name="vehiclenew" rows="5" style="width: 89%;"></textarea></td>
        </tr>
        <tr>
        	<td>Has the vehicle ever been in any accidents? Cost of repairs?<br><textarea name="accidents" rows="5" style="width: 89%;"></textarea></td>
            <td>Is there existing damage on the vehicle? Where?<br><textarea name="damage" rows="5" style="width: 89%;"></textarea></td>
        </tr>
        <tr>
        	<td>Has the vehicle ever had paint work performed?<br><textarea name="paint" rows="5" style="width: 89%;"></textarea></td>
            <td>Is the title designated 'Salvage' or 'Reconstructed'? Any other?<br><textarea name="salvage" rows="5" style="width: 89%;"></textarea></td>
        </tr>
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