<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

<!-- optionally uncomment line below if using a theme or icon set like font awesome (note that default icons used are glyphicons and `fa` theme can override it) -->
<!-- link https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css media="all" rel="stylesheet" type="text/css" /-->
<!-- piexif.min.js is only needed for restoring exif data in resized images and when you 
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/js/fileinput.min.js"></script>
<!-- optionally uncomment line below for loading your theme assets for a theme like Font Awesome (`fa`) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/themes/fa/theme.min.js"></script>
<!-- optionally if you need translation for your language then include  locale file as mentioned below 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/js/locales/LANG.js"></script>-->

<style>
.btn-file {
  top: -11px !important;
}
.btn-default {
  top: -11px !important;
}
.file-thumb-progress .progress-bar {
  height: 22px !important;
  font-size: 13px !important;
}
.progress-bar {
  text-align: center !important;
}
</style>

<div class="container kv-main">

<img src="{$avatar}" style="
    margin: 25px;
    max-height: 200px; 
    border:8px solid #;
    -webkit-box-shadow:0px -1px 25px rgba(0,0,0,0.5), 0px 1px 25px rgba(0,0,0,0.7);
    -moz-box-shadow:0px -1px 25px rgba(0,0,0,0.5), 0px 1px 25px rgba(0,0,0,0.7);
    box-shadow:0px -1px 25px rgba(0,0,0,0.5), 0px 1px 25px rgba(0,0,0,0.7);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
">
<a href="#" class="btn btn-red btn-sm">Current Profile Avatar</a>

  <form enctype="multipart/form-data">
      <div class="form-group">

          <input  id="file-1" 
                  type="file" 
                  multiple 
                  class="file" 
                  data-overwrite-initial="false" 
                  data-min-file-count="1"
                  name="avatar">
      </div>
  </form>
</div>


<script>
    $("#file-1").fileinput({
        uploadUrl:'http://10.0.0.122/xxxies/block/image',
        // showCaption: true,
        allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: {$max_size},
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
</script>
