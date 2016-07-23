<?php
if (strpos($_SERVER['REQUEST_URI'], 'login/index/verify')) {

	echo '<div class="alert alert-danger text-center"><h3>Account not verified</h3>
    You have registered on our site, but have not confirmed your account yet. Please check your email inbox for instructions on verifying your account.</div>';
}

/**
 * Password reset form was submitted and successfully completed
 */
if (strpos($_SERVER['REQUEST_URI'], 'login/password_reset_complete')) {
	?>

<section class="container">
  <div class="row">
    <?php echo '<h1>Password successfully reset</h1>'; ?>
    <!-- LOGIN -->
    <div>
      <form class="white-row" method="post" action="<?=BASE_URL . 'login/login_validate';?>">
      <h2><small>You may now login with your new password</small></h2>
        <div class="row">
          <div class="form-group">
            <div class="col-md-12">
              <label>Email</label>
              <input type="email" name="email" placeholder="Email address" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <div class="col-md-12">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6"> <span class="remember-box checkbox">
            <label for="rememberme">
              <input type="checkbox" id="rememberme" name="rememberme">
              Remember Me </label>
            </span> </div>
          <div class="col-md-6">
            <input type="submit" value="Sign In" class="btn btn-primary pull-right" data-loading-text="Loading...">
          </div>
        </div>
      </form>
    </div>

<?php } else {
	?>

<section class="container">
  <div class="row">

    <!-- LOGIN -->
    <div class="col-md-5 white-row">
      <legend>Member Login</legend>
      <form class="white-row" method="post" action="<?=BASE_URL . 'login/login_validate';?>">
      <?php
          if ( $data['route']->param1 == 'error_math' ) 
          {
            // Previous login attempt failed
            echo '<div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error: </strong>Math answer is incorrect</div>';
          }

          if ( $data['route']->param1 == 'error' ) 
          {
            // Previous login attempt failed
            echo '<div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert">&times;</button>
          	<strong>Error: </strong>Email or password incorrect</div>';

          		/**
          		 * Since the login attempt failed, we want to protect ourselves against brute force hacking attempts.
          		 * We don't want to annoy users with CAPTCHA forms, and we don't want to resort to locking members out or
          		 * not letting them attempt to login again for X-amount of time either, which not only also annoys users, but also
          		 * uses up system resources.
          		 * The best solution for protecting ourselves while keeping our users happy is to simply delay the execution of the script
          		 * when a failed login attempt occurs. By delaying the processing of the request, the time it takes to successfully
          		 * crack an account is enormous and unattainable for all intents and purposes.
          		 * We don't want to delay the processing too long either, else the user may get frustrated with high page load times.
          		 * We can modify how long this delay occurs in the sleep() function below. The value of the number is in seconds, so by
          		 * default we delay failed login attempts for 2 seconds. The higher we set this number, the more secure we are, however,
          		 * it also means the user has to wait that much longer for the page to reload. Keep in mind that a delay of just 10 milliseconds
          		 * greatly lengthens any brute force or dictionary attack. A value of 2 seconds should be a good compromise, as it gives
          		 * terrific protection while being practically unnoticeable to users, but any value between 1 - 5 should be reasonable.
          		 * Any more than that starts using up resources, as well as annoying people!
          		 */
          		sleep(2);
          }
      	?>
        <div class="row">
          <div class="form-group">
            <div class="col-md-12">
              <h6>Email</h6>
              <input type="email" name="email" placeholder="Email address" class="form-control" style="width:100%"
              <?php if (isset($data['email'])) {echo "value=" . $data['email'] . "";}?> required=required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group">
            <div class="col-md-12">
              <h6>Password</h6>
              <input type="password" name="password" class="form-control"
              <?php if (isset($data['password'])) {echo "value=" . $data['password'] . "";}?> required=required>
            </div>
          </div>
        </div>

        <?php if ($this->toolbox('config')->setting['login_math'] === TRUE): ?>
        <div class="row">
          <div class="form-group col-md-12">
          <span>Are you human? Solve the math problem below</span>
            <div class="input-group">
              <span class="input-group-addon">
                <strong><?=$data['a'];?> x <?=$data['b'];?></strong>
              </span>
              <input type="number" name="math" class="form-control" required=required>
            </div>
          </div>
        </div>
        <?php endif;?>

        <div class="row">

        <div class="col-xs-12">
          <button class="btn btn-primary btn-lg btn-block" data-loading-text="Loading..."><i class="fa fa-unlock"></i> Sign In</button>
        </div>

        </div>

        <input type="hidden" name="math_answer" value="<?=$data['a'] * $data['b'];?>">

      </form>
    </div>
    <!-- /LOGIN -->
    <div class="col-md-1"></div>
    <!-- PASSWORD -->
    <div class="col-md-5 white-row">
      <legend>Forgot Password?</legend>
      <div class="white-row">
        <p> Enter your email address below and follow the instructions to reset your password </p>
        <h6>Email Address</h6>
        <form class="input-group" method="post" action="<?=BASE_URL;?>login/forgot_password">
          <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" required=required />
          <span class="input-group-btn">
          <button class="btn btn-primary">Reset Password</button>
          </span>
        </form>
      </div>
      <p class="white-row text-center styleBackground"> Need an account? <a href="<?=BASE_URL;?>signup">Register now</a> </p>
    </div>
    <!-- /PASSWORD -->

  </div>

</section>
<?php }