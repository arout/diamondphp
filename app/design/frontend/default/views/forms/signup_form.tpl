{* City and state autofill *}
<link rel="stylesheet" href="{$smarty.const.MODULES_URL}datepicker/public/css/default.css" type="text/css">
<script src="{$smarty.const.MODULES_URL}datepicker/public/javascript/zebra_datepicker.js"></script>
<script>
    $(document).ready(function() { 

    {* assuming the input elements you want to attach the plugin to have the "datepicker" class set *}
    $('input.datepicker').Zebra_DatePicker( { 
      view: 'years'
     } );

 } );
</script>
<link rel="stylesheet" href="{$smarty.const.MODULES_URL}form-validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="{$smarty.const.MODULES_URL}form-validation/dist/js/bootstrapValidator.js"></script>
<div class="main" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
    <div class="form-block center-block">
        <h2 class="title">Create Account</h2>
        <hr>
        <form class="form-horizontal" id="signup" name="signup" role="form" method="post" action="{$smarty.const.BASE_URL}signup/signup_validate">
            <div class="form-group has-feedback">
                <label for="first_name" class="col-sm-3 control-label">First Name <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{$data['first_name']}" placeholder="First Name" required>
                    <i class="fa fa-pencil form-control-feedback"></i>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="last_name" class="col-sm-3 control-label">Last Name <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{$data['last_name']}" placeholder="Last Name" required>
                    <i class="fa fa-pencil form-control-feedback"></i>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="username" class="col-sm-3 control-label">Username <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="username" id="username" class="form-control col-xs-12 pull-left" value="{$data['username']}" placeholder="Username" required>
                    <i class="fa fa-user form-control-feedback"></i><br>
                    <span style='margin-top: 5px;' id="username_availability_result"></span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="email" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <input type="email" name="email" id="email" class="form-control" value="{$data['email']}" placeholder="Email address" >
                    <i class="fa fa-envelope form-control-feedback"></i><br>
                    <span style='margin-top: 5px;' id="email_availability_result"></span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="password" class="col-sm-3 control-label">Password <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <input type="password" name="password" id="password" class="form-control" value="{$data['password']}" placeholder="Password" >
                    <i class="fa fa-lock form-control-feedback"></i>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="confirm_password" class="col-sm-3 control-label"><span class="text-danger small">Confirm Password</span></label>
                <div class="col-sm-8">
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="{$data['confirm_password']}" placeholder="Confirm Password" >
                    <i class="fa fa-lock form-control-feedback"></i>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="dob" class="col-sm-3 control-label">Date of Birth <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <input type="date" name="dob" id="dob" class="form-control datepicker" value="{$data['dob']}" placeholder="Enter DOB YYYY-MM-DD" >
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="gender" class="col-sm-3 control-label">Gender <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <select name="gender" id="gender" class="form-control">
                        <option>-- Gender --</option>
                        <option value="male">Man</option>
                        <option value="female">Woman</option>
                        <option value="couple">Couple</option>
                    </select>
                    <i class="fa fa-user form-control-feedback"></i>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="phone" class="col-sm-3 control-label">Phone # <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <input type="tel" name="phone" id="phone" class="form-control" value="{$data['phone']}" placeholder="Include area code">
                    <i class="fa fa-phone form-control-feedback"></i>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="zip" class="col-sm-3 control-label">Zip Code <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <input type="number" name="zip" id="zip" class="form-control" maxlength="5" value="{$data['zip']}" placeholder="Zip Code" >
                    <i class="fa fa-location-arrow form-control-feedback"></i>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="city" class="col-sm-3 control-label">City <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <select name="city" id="city" class="form-control">
                        <option>-- Zip code needed --</option>
                    </select>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="state" class="col-sm-3 control-label">State <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <select name="state" id="state" class="form-control">
                        <option>-- Zip Code Needed --</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" required> Accept our <a href="#">privacy policy</a> and <a href="#">customer agreement</a>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                    <button type="submit" class="btn btn-default">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
</div>

    
<div class="main" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
    <div class="form-block center-block">
        <h2 class="title">Registration is fast, easy, and free</h2>
            <p>Once you're registered, you can:</p>
            <ul class="list-icon check">
                <li>Recieve email notifications of updates</li>
                <li>Learn about our new software products</li>
                <li>Join the community discussion forum</li>
                <li>Help us keep track of the awesome websites built with Diamond PHP</li>
            </ul>
            <hr class="half-margins" />
            <p class="white-row text-center styleBackground"> Already have an account? <a href=" {$smarty.const.BASE_URL}login">Member Login</a> </p>
    </div>
</div>
    

<script type="text/javascript">
$(document).ready(function()  { 
    $('#signup').bootstrapValidator( { 
        message: 'This value is not valid',
        feedbackIcons:  { 
            valid: 'fa fa-check',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'fa fa-refresh'
        },
        fields:  { 
            username:  { 
                message: 'The username is not valid',
                validators:  { 
                    notEmpty:  { 
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength:  { 
                        min: 6,
                        max: 40,
                        message: 'The username must be at least 6 and less than 40 characters long'
                    },
                    regexp:  { 
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            first_name:  { 
                message: 'The name is not a valid name',
                validators:  { 
                    notEmpty:  { 
                        message: 'Your first name is required and can\'t be empty'
                    },
                    stringLength:  { 
                        max: 40,
                        message: 'Your first name must be less than 40 characters long'
                    },
                    regexp:  { 
                        regexp: /^[a-zA-Z -\.]+$/,
                        message: 'Your first name can only consist of alphabetical, spaces and dashes (-)'
                    }
                }
            },
            last_name:  { 
                message: 'The name is not a valid name',
                validators:  { 
                    notEmpty:  { 
                        message: 'Your last name is required and can\'t be empty'
                    },
                    stringLength:  { 
                        max: 40,
                        message: 'Your last name must be less than 40 characters long'
                    },
                    regexp:  { 
                        regexp: /^[a-zA-Z -\.]+$/,
                        message: 'Your last name can only consist of alphabetical, spaces and dashes (-)'
                    }
                }
            },
            gender:  { 
                validators:  { 
                    notEmpty:  { 
                        message: 'You must select your gender'
                    }
                }
            },
            terms:  { 
                validators:  { 
                    notEmpty:  { 
                        message: 'You must accept the terms of use'
                    }
                }
            },
            privacy:  { 
                validators:  { 
                    notEmpty:  { 
                        message: 'You must accept the privacy agreement'
                    }
                }
            },
            email:  { 
                validators:  { 
                    notEmpty:  { 
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress:  { 
                        message: 'The input is not a valid email address'
                    }
                }
            },
            url:  { 
                validators:  { 
                    uri:  { 
                        allowLocal: true,
                        message: 'The input is not a valid URL'
                    }
                }
            },
            phone:  { 
                validators:  { 
                    notEmpty:  { 
                        message: 'Phone number is required and can\'t be empty'
                    },
                    stringLength:  { 
                        min: 10,
                        max: 10,
                        message: 'Phone number must be 10 digits long (area code + number)'
                    },
                    regexp:  { 
                        regexp: /^[0-9\.]+$/,
                        message: 'Phone number can only contain numerical characters'
                    }
                }
            },
            color:  { 
                validators:  { 
                    hexColor:  { 
                        message: 'The input is not a valid hex color'
                    }
                }
            },
            zip:  { 
                validators:  { 
                    notEmpty:  { 
                        message: 'The zip code is required and can\'t be empty'
                    },
                    zipCode:  { 
                        country: 'US',
                        message: 'The input is not a valid US zip code'
                    }
                }
            },
            city:  { 
                validators:  { 
                    notEmpty:  { 
                        message: 'The city is required and can\'t be empty'
                    }
                }
            },
            state:  { 
                validators:  { 
                    notEmpty:  { 
                        message: 'The state is required and can\'t be empty'
                    }
                }
            },
            password:  { 
                validators:  { 
                    notEmpty:  { 
                        message: 'The password is required and can\'t be empty'
                    },
                    identical:  { 
                        field: 'confirm_password',
                        message: 'The password and password confirmation fields do not match'
                    }
                }
            },
            confirm_password:  { 
                validators:  { 
                    notEmpty:  { 
                        message: 'The confirm password field is required and can\'t be empty'
                    },
                    identical:  { 
                        field: 'password',
                        message: 'The password and password confirmation fields do not match'
                    }
                }
            },
            // dob:  { 
            //     validators:  { 
            //         notEmpty:  { 
            //             message: 'The date of birth is required and can\'t be empty'
            //         }
            //     }
            // },
            ages:  { 
                validators:  { 
                    lessThan:  { 
                        value: 100,
                        inclusive: true,
                        message: 'The ages has to be less than 100'
                    },
                    greaterThan:  { 
                        value: 18,
                        inclusive: false,
                        message: 'You must be at least 18 to join our site'
                    }
                }
            }
        }
    } );
} );
</script>

<script>
$(document).ready(function()
 {  
    $("#zip").change(function()
     {  
        var zip = $(this).val();
        $.ajax(
         {  
            url:" {$smarty.const.BASE_URL}block/get_city/" + zip,
            type:"post",
            data: { zip:$(this).val()},
            success:function(response)
             { 
                $("#city").html(response);
            }
        } );
    } );
} );
        
$(document).ready(function()
 {  
    $("#zip").change(function()
     {  
        var zip = $(this).val();
        $.ajax(
         {  
            url:" {$smarty.const.BASE_URL}block/get_state/" + zip,
            type:"post",
            data: { zip:$(this).val()},
            success:function(response)
             { 
                $("#state").html(response);
            }
        } );
    } );
} );


$(document).ready(function() 
 {  
    //the min chars for username  
    var min_chars = 6;  

    //result texts  
    var characters_error = '';  
    var checking_html = 'Checking...';  

    //when button is clicked  
    $('#username').change(function() {   
        //run the character number check  
        if($('#username').val().length < min_chars) {   
            //if it's below the minimum show characters_error text '  
            $('#username_availability_result').html(characters_error);  
        }else {   
            //else show the cheking_text and run the function to check  
            $('#username_availability_result').html(checking_html);  
            check_availability();  
        }  
    } );  

} );  
  
//function to check username availability  
function check_availability() 
 {  
    //get the username  
    var username = $('#username').val();  

    //use ajax to run the check  
    $.post(" {$smarty.const.BASE_URL}block/check_username/" + username,  {  username: username },  
        function(result) {   
            //if the result is 0
            if(result == 0) {   
                $('#username_availability_result').removeClass("btn btn-danger btn-sm").addClass("btn btn-success btn-sm").html('Username ' + username + ' is available');  
            }else {   
                $('#username_availability_result').removeClass("btn btn-success btn-sm").addClass("btn btn-danger btn-sm").html('Username ' + username + ' is not available. Please choose another username.');  
            }  
    } );  
  
}


$(document).ready(function() 
 {  
    var min_chars = 6;  

    //result texts  
    var characters_error = '';  
    var checking_html = 'Checking...';  

    //when button is clicked  
    $('#email').change(function() {   
        //run the character number check  
        if($('#email').val().length < min_chars) {   
            //if it's below the minimum show characters_error text '  
            $('#email_availability_result').html(characters_error);  
        }else {   
            //else show the cheking_text and run the function to check  
            $('#email_availability_result').html(checking_html);  
            check_email_availability();  
        }  
    } );  

} );  
  
//function to check email availability  
function check_email_availability() 
 {  
    //get the email  
    var email = $('#email').val();  

    //use ajax to run the check  
    $.post(" {$smarty.const.BASE_URL}block/check_email/",  {  email: email },
        function(result) {   
            //if the result is 0
            if(result == 0) {   
                $('#email_availability_result').removeClass("btn btn-danger btn-sm").addClass("btn btn-success btn-sm").html(email + ' is available');  
            }else {   
                $('#email_availability_result').removeClass("btn btn-success btn-sm").addClass("btn btn-danger btn-sm").html(email + ' is already registered. <br>Please <a style="color:yellow" href=" {$smarty.const.BASE_URL}login">reset your password</a> if you have forgotten it.');  
            }  
    } );  
  
}
</script>