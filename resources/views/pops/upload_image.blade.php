
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
    <div class="panel-heading">Upload Image</div>
     <form action="showUploaded" method="post" enctype="multipart/form-data">
        <input type="file" class="img_input" name="image"><br>
        <input type="hidden" name="_token" value={{ csrf_token() }} >
        <input type="hidden" class="copy_div" name="copyDiv" value={{ $copyDiv }} >
        <input type="submit" class="img_submit" value="Upload">
     </form>
  </body>
</html>
