<div class="white-row">
	
	<?php foreach( $data['profile'] as $profile): ?>
	
        <form id="signup" class="white-row" method="post" action="">
        
            <legend>Editing <?= $profile['username']; ?>'s profile</legend>
            <small>To change your password, <a href="<?= BASEURL; ?>member/change_password">go here</a></small>
            
            <?php if( isset( $data['saved'] ) ) echo $data['saved']; ?>
            
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $profile['first_name'] ?>" placeholder="First Name" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $profile['last_name'] ?>" placeholder="Last Name" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $profile['username'] ?>" placeholder="Username" >
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $profile['email'] ?>" placeholder="Email address" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Date of birth</label>
                        <input type="text" name="dob" id="dob" class="form-control datepicker" value="<?= $profile['dob'] ?>" placeholder="Enter DOB YYYY-MM-DD" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Mobile Phone Number</label>
                        <input type="tel" name="phone" id="phone" class="form-control" value="<?= $profile['phone'] ?>" placeholder="Include area code" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>About Me</label>
                        <textarea name="about_me" id="about_me" class="form-control" value="<?= $profile['about_me']; ?>"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Facebook Page</label>
                        <input type="url" name="facebook_page" id="facebook_page" class="form-control" value="<?= $profile['facebook_page']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Personal Website / URL</label>
                        <input type="url" name="personal_website" id="personal_website" class="form-control" value="<?= $profile['personal_website']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Zip Code</label>
                        <input type="number" name="zip" id="zip" class="form-control" maxlength="5" value="<?= $profile['zip']; ?>" placeholder="Zip Code" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>City <small><em>(must change zip code first)</em></small></label>
                        <br>
                        <select name="city" id="city" class="form-control">
                            <option value="<?= $profile['city'] ?>"><?= $profile['city'] ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>State <small><em>(must change zip code first)</em></small></label>
                        <br>
                        <select name="state" id="state" class="form-control">
                            <option value="<?= $profile['state'] ?>"><?= $profile['state'] ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="Save Changes" class="btn btn-block btn-primary pull-right push-bottom" data-loading-text="Loading...">
                </div>
            </div>
        </form>
        
	<?php endforeach; ?>

</div>
<script>
$(document).ready(function()
        {
            $("#zip").change(function()
            {
                var zip = $(this).val();//get select value
                $.ajax(
                {
                    url:'<?= BASEURL; ?>public/plugins/ajax/get_city.php',
                    type:"post",
                    data:{zip:$(this).val()},
                    success:function(response)
                    {
                        $("#city").html(response);
                    }
                });
            });
        });
		
$(document).ready(function()
        {
            $("#zip").change(function()
            {
                var zip = $(this).val();//get select value
                $.ajax(
                {
                    url:"<?= BASEURL; ?>public/plugins/ajax/get_state.php",
                    type:"post",
                    data:{zip:$(this).val()},
                    success:function(response)
                    {
                        $("#state").html(response);
                    }
                });
            });
        });
</script>


<?php # Date picker JS ?>
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/css/datepicker.css" type="text/css">
<script type="text/javascript">
		    $(document).ready(function() {

		    // assuming the input elements you want to attach the plugin to
		    // have the "datepicker" class set
		    $('input.datepicker').Zebra_DatePicker({
			  view: 'years'
			});

		});
</script>
<?php # END Date picker JS ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#signup').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 40,
                        message: 'The username must be at least 6 and less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            first_name: {
                message: 'The name is not a valid name',
                validators: {
                    notEmpty: {
                        message: 'Your first name is required and can\'t be empty'
                    },
                    stringLength: {
                        max: 40,
                        message: 'Your first name must be less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z -\.]+$/,
                        message: 'Your first name can only consist of alphabetical, spaces and dashes (-)'
                    }
                }
            },
            last_name: {
                message: 'The name is not a valid name',
                validators: {
                    notEmpty: {
                        message: 'Your last name is required and can\'t be empty'
                    },
                    stringLength: {
                        max: 40,
                        message: 'Your last name must be less than 40 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z -\.]+$/,
                        message: 'Your last name can only consist of alphabetical, spaces and dashes (-)'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'You must select your gender'
                    }
                }
            },
            terms: {
                validators: {
                    notEmpty: {
                        message: 'You must accept the terms of use'
                    }
                }
            },
            privacy: {
                validators: {
                    notEmpty: {
                        message: 'You must accept the privacy agreement'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            url: {
                validators: {
                    uri: {
                        allowLocal: true,
                        message: 'The input is not a valid URL'
                    }
                }
            },
            phone: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 15,
                        message: 'Phone number must be 10 - 14 characters long (area code) ###-####'
                    }
                }
            },
            color: {
                validators: {
                    hexColor: {
                        message: 'The input is not a valid hex color'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'The zip code is required and can\'t be empty'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'The input is not a valid US zip code'
                    }
                }
            },
            city: {
                validators: {
                    notEmpty: {
                        message: 'The city is required and can\'t be empty'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'The state is required and can\'t be empty'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
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
            },
            dob: {
                validators: {
                    notEmpty: {
                        message: 'The date of birth is required and can\'t be empty'
                    }
                }
            },
            ages: {
                validators: {
                    lessThan: {
                        value: 100,
                        inclusive: true,
                        message: 'The ages has to be less than 100'
                    },
                    greaterThan: {
                        value: 18,
                        inclusive: false,
                        message: 'You must be at least 18 to join our site'
                    }
                }
            }
        }
    });
});
</script>
