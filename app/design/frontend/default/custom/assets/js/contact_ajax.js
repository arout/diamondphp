/**	CONTACT FORM
*************************************************** **/
	jQuery("#contact_submit").bind("click", function(e) {
		e.preventDefault();

		var contact_name 			= jQuery("#contact_name").val(),			// required
			contact_email 			= jQuery("#contact_email").val(),			// required
			contact_subject 		= jQuery("#contact_subject").val(),			// optional
			contact_phone	 		= jQuery("#contact_phone").val(),			// optional
			contact_message 		= jQuery("#contact_message").val(),			// required
			contact_captcha 		= jQuery("#contact_captcha").val(),			// required
			_action					= jQuery("#contactForm").attr('action'),	// form action URL
			_method					= jQuery("#contactForm").attr('method'),	// form method
			_err					= false;									// status

		// Remove error class
		jQuery("input, textarea").removeClass('err');

		// Name Check
		if(contact_name == '') {
			jQuery("#contact_name").addClass('err');
			var _err = true;
		}

		// Email Check
		if(contact_email == '') {
			jQuery("#contact_email").addClass('err');
			var _err = true;
		}

		// Comment Check
		if(contact_message == '') {
			jQuery("#contact_message").addClass('err');
			var _err = true;
		}

		// Stop here, we have empty fields!
		if(_err === true) {
			return false;
		}


		// SEND MAIL VIA AJAX
		$.ajax({
			url: 	_action,
			data: 	{ajax:"true", action:'email_send', contact_name:contact_name, contact_email:contact_email, contact_message:contact_message, contact_subject:contact_subject, contact_phone:contact_phone, contact_captcha:contact_captcha},
			type: 	_method,
			error: 	function(XMLHttpRequest, textStatus, errorThrown) {

				alert('Server Internal Error'); // usualy on headers 404

			},

			success: function(data) {
				data = data.trim(); // remove output spaces


				// PHP RETURN: Mandatory Fields
				if(data == '_required_') {
					// alert('Please complete all fields!');
					jQuery("#_sent_required_").removeClass('hide');
				} else

				// PHP RETURN: INVALID EMAIL
				if(data == '_invalid_email_') {
					// alert('Invalid Email!');
					jQuery("#_sent_required_").removeClass('hide');
				} else

				// PHP RETURN: INVALID CAPTCHA
				if(data == '_invalid_captcha_') {
					// alert('Invalid Captcha!');
					jQuery("#_sent_required_").removeClass('hide');
					jQuery("#captcha").addClass('err');
				} else

				// VALID EMAIL
				if(data == '_sent_ok_') {

					// append message and show ok alert
					jQuery("#_sent_ok_").removeClass('hide');

					// reset form
					jQuery("#contact_name, #contact_email, #contact_subject, #contact_message, #contact_phone").val('');

				} else {

					// PHPMAILER ERROR
					alert(data); 

				}
			}
		});

	});