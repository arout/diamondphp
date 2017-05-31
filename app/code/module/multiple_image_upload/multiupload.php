<!DOCTYPE html>
<html>
    <head>
		<title>Upload Multiple Images Using jquery and PHP</title>
		<!-------Including jQuery from google------>
        <script src="jquery-2.1.1.min.js"></script>
        <script src="script.js"></script>
		
		<!-------Including CSS File------>
        <link rel="stylesheet" type="text/css" href="style.css">
    <body>
        <div id="maindiv">

            <div id="formdiv">
                <h2>Multiple Image Upload Form</h2>
                <form enctype="multipart/form-data" action="" method="post">
                    First Field is Compulsory. Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 100KB.
                    <hr/>
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="upload" value="Add More Files"/>
                    <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
                </form>
                <br/>
                <br/>
				<!-------Including PHP Script here------>
                <?php include "upload.php"; ?>
            </div>
           
		   <!-- Right side div -->
            <div id="formget"><a href=http://www.formget.com/app><img src="formget.jpg" alt="Online Form Builder"/></a>
            </div>
        </div>
    </body>
</html>