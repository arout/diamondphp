<?php
if( strpos($_SERVER['REQUEST_URI'], 'member/password_reset/complete') ) {
	
	echo '<h1>Password successfully reset</h1>';
} else {
?>

<!-- PASSWORD -->
    <div class="col-md-6">
      
      <div class="white-row container">
      <legend>Reset your password</legend>
        <p> Enter your new password below</p>
        <label>New Password</label>
        <form class="input-group" method="post" action="">
        
          <input type="password" class="form-control" name="password" id="password" placeholder="New Password" />
          <span class="input-group-btn">
          <button class="btn btn-primary">Reset Password</button>
          </span>
        </form>
      </div>
    </div>
<!-- /PASSWORD -->

<?php
}
