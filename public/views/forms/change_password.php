<div class="white-row">

<?php if( isset( $data['status'] ) ) echo $data['status']; ?>

<legend>Change password</legend>
        
        <form method="post" id="cpass" class="white-row styleBackground" action="<?= BASEURL; ?>member/change_password">
			
			<div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label>Enter New Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                    </div>
                    <div class="col-md-6">
                        <label>Re-enter Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-block btn-primary pull-right push-bottom" data-loading-text="Loading...">
						<i class="fa fa-lock"></i> Change Password
					</button>
                </div>
            </div>
        </form>
</div>


<script type="text/javascript">
$(document).ready(function() {
    $('#cpass').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
             password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'confirm_password',
                        message: 'The password and password confirmation fields do not match'
                    }
                }
            },
            confirm_password: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password field is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and password confirmation fields do not match'
                    }
                }
            }
        }
    });
});
</script>