{if $uri|strstr:'login/index/verify'}

<div class="alert alert-danger text-center"><h3>Account not verified</h3>
You have registered on our site, but have not confirmed your account yet. Please check your email inbox for instructions on verifying your account.</div>

{elseif $uri|strstr:'login/password_reset_complete'}

{* Password reset form was submitted and successfully completed *}

<section class="container">
  <div class="row">
    <h1>Password successfully reset</h1>
    <!-- LOGIN -->
    <div>
      <form class="white-row" method="post" action="login/login_validate">
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

{else}

  <section class="container">
  <div class="main" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
    <div class="form-block center-block">
      <h2 class="title">Login</h2>
      <hr>
      <form class="form-horizontal" method="post" action="{$smarty.const.BASE_URL}login/login_validate">
      {if $route eq 'error_math'}
            {* Previous login attempt failed *}
            <div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error: </strong>Math answer is incorrect</div>
      {/if}
      {if $route eq 'error'}
          <div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error: </strong>Email or password incorrect</div>

              {*
                 Since the login attempt failed, we want to protect ourselves against brute force hacking attempts.
                 We don't want to annoy users with CAPTCHA forms, and we don't want to resort to locking members out or
                 not letting them attempt to login again for X-amount of time either, which not only also annoys users, but also
                 uses up system resources.
                 The best solution for protecting ourselves while keeping our users happy is to simply delay the execution of the script
                 when a failed login attempt occurs. By delaying the processing of the request, the time it takes to successfully
                 crack an account is enormous and unattainable for all intents and purposes.
                 We don't want to delay the processing too long either, else the user may get frustrated with high page load times.
                 We can modify how long this delay occurs in the sleep() function below. The value of the number is in seconds, so by
                 default we delay failed login attempts for 2 seconds. The higher we set this number, the more secure we are, however,
                 it also means the user has to wait that much longer for the page to reload. Keep in mind that a delay of just 10 milliseconds
                 greatly lengthens any brute force or dictionary attack. A value of 2 seconds should be a good compromise, as it gives
                 terrific protection while being practically unnoticeable to users, but any value between 1 - 5 should be reasonable.
                 Any more than that starts using up resources, as well as annoying people!
               *}
        {/if}
        <div class="form-group has-feedback">
          <label for="email" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            <i class="fa fa-at form-control-feedback"></i>
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="password" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            <i class="fa fa-lock form-control-feedback"></i>
          </div>
        </div>
        {if $login_math}
        <div class="form-group has-feedback">
          <label for="math" class="col-sm-3 control-label">Are you human? Math problem:</label>
          <div class="col-sm-8">
              <span class="input-group-addon">
                <strong>{$a} x {$b} =</strong>
              </span>
              <input type="number" name="math" class="form-control" placeholder="Enter answer" required=required>
          </div>
        </div>
        {/if}
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-8">                   
            <button type="submit" class="btn btn-group btn-default btn-sm">Log In</button>
            <span class="text-center text-muted">Login with</span>
            <ul class="social-links colored circle clearfix">
              <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
              <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
              <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
        <input type="hidden" name="math_answer" value="{$a * $b}">
      </form>
      <div>
        <legend>Forgot Password?</legend>
        <div class="white-row">
          <p> Enter your email address below and follow the instructions to reset your password </p>
          <h6>Email Address</h6>
          <form class="input-group" method="post" action="{$smarty.const.BASE_URL}login/forgot_password">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" required=required />
            <span class="input-group-btn"><button class="btn btn-primary" style="margin-top: 0px" type="submit">Reset Password</button></span>
          </form>
        </div>
      </div>
      </div>
    </div>
    <p class="text-center space-top">Don't have an account yet? <a href="{$smarty.const.BASE_URL}signup">Sign up</a> now.</p>

    <!-- LOGIN -->


</section>

{/if}