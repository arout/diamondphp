<?php
namespace Hal\Module;

### Functioning example usage below
### $this->toolbox('email')->send( "andrewr@dynamicartisans.com", "Andrew Rout", "kW Fusion", "arout@kwfusion.com", "This is a test", "Holla!!!!" );

class Email {

	private $config;

	public function __construct($c) {
		$this->config = $c['config'];
	}

	public function send($to, $recipient_name, $from, $reply_to, $subject, $message) {

		/*
		 * $to is the email address of recipient; can be an array
		 * $recipient_name is the name of recipient
		 * $from is the company / website name
		 * $reply_to is the reply to address
		 */

		// message
		$formatted_message = '
		<html>
		<head>
			 <title>' . $subject . '</title>
		</head>
		<body>' . $this->logo_section() . $this->message_block($message, $subject) . $this->footer_block() . '
		</body>
		</html>
		';

		// To send HTML mail, the Content-type header must be set
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'To: ' . $recipient_name . ' <' . $to . '>' . "\r\n";
		$headers .= 'From: ' . $from . ' <' . $reply_to . '>' . "\r\n";

		// Mail it
		if (mail($to, $subject, $formatted_message, $headers)) {
			return;
		} else {
			echo 'There was a problem sending your message.';
		}

	}

	public function logo_section() {

		return '
            <body style="margin:0; margin-top:30px; margin-bottom:30px; padding:0; width:100%; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color: #F4F5F7;">


		<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background-color: #F4F5F7;">
			<tbody>
				<tr>
					<td align="center" style="border-collapse: collapse;">

						<!-- ROW LOGO -->
						<table cellpadding="0" cellspacing="0" border="0" width="560" style="border:0; border-collapse:collapse; background-color:#ffffff; border-radius:6px;">
							<tbody>
								<tr>
									<td style="border-collapse:collapse; vertical-align:middle; text-align center; padding:20px;">

										<!-- Headline Header -->
										<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
											<tbody>

												<tr><!-- logo -->
													<td width="100%" style="font-family: helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0px; text-align: center;">
														<a href="'.BASE_URL.'" style="text-decoration: none;">
															<img src="' . BASE_URL . 'media/logo.png" alt="" border="0" width="166" height="auto" style="with: 166px; height: auto; border: 5px solid #ffffff;">
														</a>
													</td>
												</tr>
												<tr><!-- spacer before the line -->
													<td width="100%" height="20"></td>
												</tr>
												<tr><!-- line -->
													<td width="100%" height="1" bgcolor="#d9d9d9"></td>
												</tr>
												<tr><!-- spacer after the line -->
													<td width="100%" height="30"></td>
												</tr>
												<tr>
													<td width="100%" style=" font-size: 14px; line-height: 24px; font-family:helvetica, Arial, sans-serif; text-align: left; color:#87919F;">
													' . $this->config->setting('site_slogan') . '
													</td>
												</tr>
												<tr>
													<td width="100%" height="15"></td>
												</tr>
											</tbody>
										</table>
										<!-- /Headline Header -->

									</td>
								</tr>
							</tbody>
						</table>
						<!-- /ROW LOGO -->
						<!-- Space -->
						<table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
											<tbody>
												<tr>
													<td width="100%" height="20"></td>
												</tr>
											</tbody>
										</table>
										<!-- /Space -->
        ';

	}

	public function message_block($message, $subject) {

		return '
            <!-- /ROW TXT ONLY -->
						<table cellpadding="0" cellspacing="0" border="0" width="560" style="border:0; border-collapse:collapse; background-color:#ffffff; border-radius:6px;">
							<tbody>
								<tr>
									<td style="border-collapse:collapse; vertical-align:middle; text-align center; padding:20px;">

										<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
											<tbody>
												<tr><!-- spacing top -->
													<td width="100%" height="20"></td>
												</tr>
												<tr><!-- title -->
													<td width="100%" style="font-family: helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0px; text-align: center; color:#F07057;">
														<strong>'.$subject.'</strong>
													</td>
												</tr>
												<tr><!-- spacing bottom -->
													<td width="100%" height="30"></td>
												</tr>
												<tr>
													<td width="100%" style="font-family:helvetica, Arial, sans-serif; font-size: 14px; text-align: left; color:#87919F; line-height: 24px;">' . $message . '
													</td>
												</tr>
												<tr><!-- spacing -->
													<td width="100%" height="30"></td>
												</tr>
												<tr>
													<td>
														<!--  Columns
														<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
															<tbody>
																<tr>
																	<td width="100%">


																		<table width="260" border="0" cellpadding="0" cellspacing="0" align="right" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
																			<tbody>
																				<tr>
																					<td width="100%" style="font-size: 15px; color:#2E363F; text-align: left; font-family: Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: top; text-transform: uppercase; letter-spacing: 0px;">
																						<strong>YES</strong> WE CAN
																					</td>
																				</tr>
																				<tr>
																					<td width="100%" height="10"></td>
																				</tr>
																				<tr>
																					<td width="260" style="font-family:helvetica, Arial, sans-serif; font-size: 14px; text-align: left; color:#87919F; line-height: 24px;">
																						Lorem ipsum dolor sit amet, consectetur adipis icing elit, sed do eiusmod tempor
																						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
																					</td>
																				</tr>
																			</tbody>
																		</table>


																		<table width="260" border="0" cellpadding="0" cellspacing="0" align="right" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
																			<tbody>
																				<tr>
																					<td width="100%" style="font-size: 15px; color:#2E363F; text-align: left; font-family: Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: top; text-transform: uppercase; letter-spacing: 0px;">
																						<strong>YES</strong> YOU CAN
																					</td>
																				</tr>
																				<tr>
																					<td width="100%" height="10"></td>
																				</tr>
																				<tr>
																					<td width="260" style="font-family:helvetica, Arial, sans-serif; font-size: 14px; text-align: left; color:#87919F; line-height: 24px;">
																						Lorem ipsum dolor sit amet, consectetur adipis icing elit, sed do eiusmod tempor
																						incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
																					</td>
																				</tr>
																			</tbody>
																		</table>

																	</td>
																</tr>
															</tbody>
														</table><!-- /Columns -->
													</td>
												</tr>
												<tr>
													<td width="100%" height="15"></td>
												</tr>
											</tbody>
										</table>

									</td>
								</tr>
							</tbody>
						</table>
						<!-- /ROW TXT ONLY -->
        ';

	}

	public function footer_block() {

		return '
            <!-- ROW FOOTER -->
						<table cellpadding="0" cellspacing="0" border="0" width="560" style="border:0; border-collapse:collapse; background-color:#ffffff; border-radius:6px;">
							<tbody>
								<tr>
									<td style="border-collapse:collapse; vertical-align:middle; text-align center; padding:20px;">

										<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
											<tbody>
												<tr>
													<td width="100%">
														<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
															<tbody>
																<tr>
																	<td width="225"></td>
																	<td width="30" style="text-align: center;">
																		<a href="#"><!-- linkedin -->
																			<img src="assets/images/email_template/social_icon1.png" alt="" border="0" class="hover" width="30" height="auto" style="width: 30px; height: auto;">
																		</a>
																	</td>
																	<td width="10"></td>
																	<td width="30" style="text-align: center;">
																		<a href="#"><!-- facebook -->
																			<img src="assets/images/email_template/social_icon2.png" alt="" border="0" class="hover" width="30" height="auto" style="width: 30px; height: auto;">
																		</a>
																	</td>
																	<td width="10"></td>
																	<td width="30" style="text-align: center;">
																		<a href="#"><!-- twitter -->
																			<img src="assets/images/email_template/social_icon3.png" alt="" border="0" class="hover" width="30" height="auto" style="width: 30px; height: auto;">
																		</a>
																	</td>
																	<td width="10"></td>
																	<td width="30" style="text-align: center;">
																		<a href="#"><!-- dribble -->
																			<img src="assets/images/email_template/social_icon4.png" alt="" border="0" class="hover" width="30" height="auto" style="width: 30px; height: auto;">
																		</a>
																	</td>
																	<td width="225"></td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
												<tr>
													<td width="100%" height="25"></td>
												</tr>
											</tbody>
										</table>

										<!-- copyright-->
										<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
											<tbody>
												<tr><!-- copyright -->
													<td width="100%" style="font-family: helvetica, Arial, sans-serif; font-size: 11px; text-align: center; line-height: 24px;">
														<center>Copyright &copy; '.date("Y").' All Rights Reserved.</center>
													</td>
												</tr>
												<tr>
													<td width="100%" height="30"></td>
												</tr>
												<tr><!-- subscribe / unsubscribe -->
													<td width="100%" style="font-family:helvetica, Arial, sans-serif; font-size: 11px; text-align: center; color: rgb(119, 119, 119); line-height: 21px; font-style: italic;">
														<a href="#" style="text-decoration: none; color: #F07057;">Subscribe</a>
														/
														<a href="#" style="text-decoration: none; color: #F07057;">Unsubscribe</a>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- /copyright -->


									</td>
								</tr>
							</tbody>
						</table>
						<!-- /ROW FOOTER -->


					</td>
				</tr>
			</tbody>
		</table>
        ';
	}
}
