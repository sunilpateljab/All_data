<?php
echo $msg;
?>
<form action="<?php echo base_url(); ?>Home_controller/signup" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Enter User Name">
    <br><br>
    <input type="text" name="email" placeholder="Enter User Email">
    <br><br>
    <input type="text" name="mobile" placeholder="Enter User Mobile Number">
    <br><br>
    <input type="password" name="password" placeholder="Enter User Password">
    <br><br>
    <input type="file" name="image">
    <br><br>
    <input type="submit" name="register" value="Register">
</form>

