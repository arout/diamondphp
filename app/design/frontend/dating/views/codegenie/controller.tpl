{nocache}

<legend>Create a Controller</legend>

<div>
  <form class="white-row" action="{$submit_controller}" method="post">
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
          Generate a view for this controller? </label>
        </span> </div>
      <div class="col-md-4">
        <input type="submit" value="Generate Code" class="btn btn-primary pull-right" data-loading-text="Loading...">
      </div>
    </div>
  </form>
</div>
{/nocache}
