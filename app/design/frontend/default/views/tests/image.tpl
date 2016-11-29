<script src="<?= TEMPLATE_URL ?>assets/js/script.js"></script>
<link rel="stylesheet" type="text/css" href="<?= PLUGINS_URL ?>multiple_image_upload/style.css">

<div class="white-row">
<legend>Images must be jpg, jpeg, png or gif format, and a maximum file size of <strong><?= $data['notify_img_size']; ?></strong>.</legend>
                <form enctype="multipart/form-data" id="img-uploader" action="" method="post" role="form">
                    
                    <?php
					if( isset( $data['errors']) ) {
						foreach($data['errors'] as $error)
							    echo 'Result: '.$error .'<br>';
					}
					?>
					<br><br>
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <button type="button" id="add_more" class="btn btn-success" /><i class="fa fa-plus-circle"></i> Add more files</button>
                    <button type="submit" name="submit" id="upload" class="btn btn-info"/><i class="fa fa-upload"></i> Upload</button>
                </form>
                <br/>
                <br/>

</div>