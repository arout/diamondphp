<script src="<?= PLUGINS_URL; ?>ckeditor/ckeditor.js"></script>

<form action="<?= BASEURL; ?>documents/process" method="post" role="form">

<h3>Create Document</h3>

<div class="input-group">
  <span class="input-group-addon"><span style="font-size: 21px; font-weight: bold; letter-spacing: 1px;">Title >> </span></span>
 <input type="text" class="form-control" id="document_title" name="document_title" placeholder="Give this document a title">
</div>
<br>

<textarea name="document" id="document" rows="10" cols="80"></textarea>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace( 'document' );
</script>
<br><br>

<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option1"> Save as draft
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option3"> Publish
  </label>
</div>

<button class="btn btn-success pull-right" data-loading-text="Saving..."><i class="fa fa-pencil-square-o"></i> Publish</button>
            
</form>