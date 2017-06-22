{nocache}
<link rel="stylesheet" href="{$smarty.const.MODULES_URL}form-validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="{$smarty.const.MODULES_URL}form-validation/dist/js/bootstrapValidator.js"></script>

<legend>Create a Controller</legend>

<div>
  <form class="white-row" name="createcontroller" id="createcontroller" action="{$submit_controller}" method="post">
  <h2><small>Specify your controller and options to create</small></h2>
    <div class="row">
      <div class="form-group">
        <div class="col-md-12">
          <label>Controller Name (no underscores, spaces or special characters)</label>
          <input type="text" name="controller_name" placeholder="Name of Controller" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"> <span class="remember-box checkbox">
        <label for="create_model">
          <input type="checkbox" id="create_model" name="create_model" checked="checked">
          Generate a model for this controller? </label>
        </span> </div>
       <div class="col-md-4"> <span class="remember-box checkbox">
        <label for="create_view">
          <input type="checkbox" id="create_view" name="create_view" checked="checked">
          Generate a view <code>(index.tpl)</code> for this controller? </label>
        </span> </div>
      <div class="col-md-4">
        <input type="submit" value="Generate Code" class="btn btn-primary pull-right" data-loading-text="Loading...">
      </div>
    </div>
    <p>
        <em>Uncheck the boxes above if you do not need a model or view generated for this controller. By default, each will be created.</em>
    </p>
  </form>
</div>


<script type="text/javascript">
$(document).ready(function()  { 
    $('#createcontroller').bootstrapValidator( { 
        message: 'This value is not valid',
        feedbackIcons:  { 
            valid: 'fa fa-check',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'fa fa-refresh'
        },
        fields:  { 
            controller_name:  { 
                message: 'The controller name is not valid',
                validators:  { 
                    notEmpty:  { 
                        message: 'The controller name is required and can\'t be empty'
                    },
                    stringLength:  { 
                        min: 1,
                        max: 75,
                        message: 'The controller name must be at least 1 and less than 75 characters long'
                    },
                    regexp:  { 
                        regexp: /^[a-zA-Z\.]+$/,
                        message: 'The controller name can only consist of letters. No numbers, spaces or special characters of any type are allowed.'
                    }
                }
            }
        }
    } );
} );
</script>

{/nocache}
