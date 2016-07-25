<section class="main-container">

	<div class="container">
		<div class="row">

			<!-- main start -->
			<!-- ================ -->
			<div class="main col-md-8">

				<div class="section text-muted">
					<div class="container">
						<legend style="width: auto;"><h2 class="page-title">Contact Diamond PHP Support</h2></legend>
						<p>
							Please allow up to 12 hours for your message to be reviewed and responded to. <br>All fields are required.
						</p>
						<form role="form" action="" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<label class="control-label">Your Name</label>
										<input name="name" type="text" class="form-control" required=required>
										<i class="fa fa-user form-control-feedback"></i>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<label class="control-label">Your Email</label>
										<input name="email" type="email" class="form-control" required=required>
										<i class="fa fa-envelope-o form-control-feedback"></i>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<label class="control-label">Subject</label>
										<input name="subject" type="text" class="form-control" required=required>
										<i class="fa fa-navicon form-control-feedback"></i>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<label class="control-label">Message</label>
										<textarea name="message" class="form-control" rows="20" required=required></textarea>
										<i class="fa fa-pencil form-control-feedback"></i>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<input type="submit" name="submit_form" class="btn btn-default" value="Send Message">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- main end -->

			<!-- sidebar start -->
			<aside class="col-md-4">
				<div class="sidebar">
					<div class="side vertical-divider-left">
					<p><br></p><p><br></p>
						<h3 class="title"><mark>Support Contracts</mark></h3>
						<p>
							Monthly and annual technical support fom the Diamond PHP development team are available on a contract basis.
						</p>
						<p>
							Please visit the <a href="<?= BASE_URL; ?>support">support area</a> for more information on pricing and ordering.
						</p>

						<p><br></p>

						<h3 class="title"><mark>Bug Reporting</mark></h3>
						<p>
							To report a bug, please use the <a href="<?= BASE_URL; ?>contact/bugs">bug report form</a> to submit the bug report.
						</p>

						<p><br></p>

						<h3 class="title"><mark>FAQ's</mark></h3>
						<p>
							Find solutions to common questions on the <a href="<?= BASE_URL; ?>documentation/faq">FAQ page</a>.
						</p>
					</div>
				</div>
			</aside>
			<!-- sidebar end -->

		</div>
	</div>
</section>