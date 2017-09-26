{nocache}
<link rel="stylesheet" href="{$smarty.const.MODULES_URL}form-validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="{$smarty.const.MODULES_URL}form-validation/dist/js/bootstrapValidator.js"></script>
<div class="main" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
    <div class="form-block center-block">
        <h2 class="title">Search Preferences</h2>
        <hr>
        <form class="form-horizontal" id="search_prefs" name="search_prefs" role="form" method="post" action="{$smarty.const.BASE_URL}member/update_search_prefs">
            
            <div class="form-group has-feedback">
                <label for="gender" class="col-sm-3 control-label">Gender <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">-- Gender --</option>
                        <option value="male">Man</option>
                        <option value="female">Woman</option>
                        <option value="couple">Couples</option>
                        <option value="any">Any</option>
                    </select>
                    <i class="fa fa-user form-control-feedback"></i>
                </div>
            </div>

            <div class="form-group has-feedback">
                
                <label for="race" class="col-sm-3 control-label">Race <br><span class="text-danger small">(select all that apply)</span></label>

                <div class="col-sm-9">
                    
                <div class="col-sm-4">
                    <div class="checkbox">
                            <input id="black" name="race[]" type="checkbox" value="Black">
                            African-American
                    </div>
                    <div class="checkbox">
                            <input id="asian" name="race[]" type="checkbox" value="Asian">
                            Asian
                    </div>
                    <div class="checkbox">
                            <input id="caucasian" name="race[]" type="checkbox" value="Caucasian">
                            Caucasian
                    </div>
                    <div class="checkbox">
                            <input id="hispanic" name="race[]" type="checkbox" value="Hispanic">
                            Hispanic
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="checkbox">
                            <input id="indian" name="race[]" type="checkbox" value="Indian">
                            Indian
                    </div>
                    <div class="checkbox">
                            <input id="middle_eastern" name="race[]" type="checkbox" value="Middle Eastern">
                            Middle Eastern
                    </div>
                    <div class="checkbox">
                            <input id="Other" name="race[]" type="checkbox" value="Other">
                            Other
                    </div>
                    <div class="checkbox">
                            <input id="Any" name="race[]" type="checkbox" value="Any">
                            Any / No Preference
                    </div>
                </div>

                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="min_age" class="col-sm-3 control-label">Minimum Age <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <input type="number" name="min_age" id="min_age" class="form-control" maxlength="2" min="18" max="99" value="18" placeholder="Minimum Age" >
                    <i class="fa fa-arrow-up form-control-feedback"></i>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="max_age" class="col-sm-3 control-label">Maximum Age <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <input type="number" name="max_age" id="max_age" class="form-control" maxlength="2" min="18" max="99" value="99" placeholder="Minimum Age" >
                    <i class="fa fa-arrow-down form-control-feedback"></i>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="body_type" class="col-sm-3 control-label">Body Type <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <select name="body_type" id="body_type" class="form-control">
                        <option value="Any">-- Any --</option>
                        <option value="Athletic">Athletic</option>
                        <option value="Average">Average</option>
                        <option value="Big and lovely">BBW</option>
                        <option value="Have some extra pounds">Have some extra pounds</option>
                        <option value="Muscular">Muscular</option>
                        <option value="Slim">Slim</option>
                    </select>
                    <i class="fa fa-thermometer form-control-feedback"></i>
                </div>
            </div>

            {* <div class="form-group has-feedback">
                <label for="min_height" class="col-sm-3 control-label">Minimum Height <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <select name="min_height" id="min_height" class="form-control">
                        <option value="">-- Minimum Height --</option>
                        <option value="Any">Any Distance</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                    <i class="fa fa-map-marker form-control-feedback"></i>
                    <span><em><small>(how far away, in miles, should we search for matches)</small></em></span>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="min_height" class="col-sm-3 control-label">Max Height <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <select name="min_height" id="min_height" class="form-control">
                        <option value="">-- Maximum Height --</option>
                        <option value="Any">Any Distance</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                    <i class="fa fa-map-marker form-control-feedback"></i>
                    <span><em><small>(how far away, in miles, should we search for matches)</small></em></span>
                </div>
            </div> *}

            <div class="form-group has-feedback">
                <label for="search_radius" class="col-sm-3 control-label">Search Radius <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <select name="search_radius" id="search_radius" class="form-control" required>
                        <option value="">-- Radius (in miles) --</option>
                        <option value="Any">Any Distance</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                    <i class="fa fa-map-marker form-control-feedback"></i>
                    <span><em><small>(how far away, in miles, should we search for matches)</small></em></span>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="marital_status" class="col-sm-3 control-label">Marital Status <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <select name="marital_status" id="marital_status" class="form-control" required>
                        <option value="">-- Marital Status --</option>
                        <option value="single">Single</option>
                        <option value="separated">Separated</option>
                        <option value="divorced">Divorced / Widowed</option>
                        <option value="Any">Any</option>
                    </select>
                    <i class="fa fa-diamond form-control-feedback"></i>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="religion" class="col-sm-3 control-label">Religion <span class="text-danger small">*</span></label>
                <div class="col-sm-8">
                    <select name="religion" id="religion" class="form-control" required>
                        <option value="">-- Select a Religion --</option>
                        <option value="Any">Any / No Preference</option>
                        <option value="Agnostic">Agnostic</option>
                        <option value="Atheist">Atheist</option>
                        <option value="Buddhist">Buddhist</option>
                        <option value="Catholic">Catholic</option>
                        <option value="Christian">Christian</option>
                        <option value="Muslim">Muslim</option>
                        <option value="Spiritual">Spiritual</option>
                        <option value="Other">Other</option>
                    </select>
                    <i class="fa fa-cloud form-control-feedback"></i>
                    <span><em><small>(how far away, in miles, should we search for matches)</small></em></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                    <button type="submit" class="btn btn-default">Update Settings</button>
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
    
{literal}
<script>
$(document).ready(function()  { 
    $('#search_prefs').bootstrapValidator( { 
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
                        message: 'Please specify the gender you are looking for'
                    }
                }
            },
            min_age:  { 
                validators:  { 
                    lessThan:  { 
                        value: 100,
                        inclusive: true,
                        message: 'This age value must be less than 100'
                    },
                    greaterThan:  { 
                        value: 17,
                        inclusive: false,
                        message: 'The minimum age has to be at least 18'
                    }
                }
            },
            max_age:  { 
                validators:  { 
                    lessThan:  { 
                        value: 100,
                        inclusive: true,
                        message: 'This age value must be less than 100'
                    },
                    greaterThan:  { 
                        value: 17,
                        inclusive: false,
                        message: 'The minimum age has to be at least 18'
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
            }
        }
    } );
} );
</script>
{/literal}
{/nocache}