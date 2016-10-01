<?php
session_start();
include("functions.php");
ssidCheck();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>記事登録</title>
  <script src="ckeditor/ckeditor.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<?php include("menu.php"); ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>記事登録</legend>
     <label>News Title<input type="text" name="name"></label><br>
     <label><input type="hidden" name="email" value="1"></label><br>
<!--     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>-->

        <textarea name="naiyou" id="editor1" rows="10" cols="80">
            This is my textarea to be replaced with CKEditor.
        </textarea>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'editor1' );
        </script>
       
     <input type="submit" value="登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
