<?php
echo $msg;
?>

<form action="<?php echo site_url(); ?>/home/test_upload" method="post" enctype="multipart/form-data">
    <input type="text" name="fname">
    <br><br>
    <input type="file" name="image">
    <br><br>
    <input type="submit" name="fileupload" value="Upload">
    
</form>
<br><br>
<a href="<?php echo base_url(); ?>">home</a>